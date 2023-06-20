@extends('blv3.app')
@section('content')
  <div class="bg-white container-paused p-lg-4">
    @include('backend.partials.alert')
    @include('backend.partials.errors')
    <div class="page-content">
      <textarea id="codemirror-editor"rows="10"cols="50"></textarea>
    </div>
  </div>
@endsection

@push('styles')
<!-- Add the following CSS in the <head> section -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/theme/monokai.min.css">

<!-- Add the following JavaScript before the closing </body> tag -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/markdown/markdown.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/php/php.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/htmlmixed/htmlmixed.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/htmlembedded/htmlembedded.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/sql/sql.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/jsx/jsx.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/javascript/javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/python/python.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/mode/loadmode.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/scroll/simplescrollbars.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/edit/matchbrackets.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/edit/closebrackets.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/edit/matchbrackets.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/fold/foldcode.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/fold/foldgutter.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/fold/brace-fold.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/hint/show-hint.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/hint/anyword-hint.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/selection/active-line.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/keymap/vim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/keymap/emacs.min.js"></script>
@endpush

@push('scripts')
<script>
  let editor = CodeMirror.fromTextArea(document.getElementById('codemirror-editor'), {
            fullScreen: false, // Fullscreen toggle
            mode: 'gfm',
            theme: 'monokai', // Set your desired theme here
            lineNumbers: true,
            vimMode: true,
            extraKeys: {
                'Ctrl-Space': 'autocomplete',
                'Ctrl-Q': function(cm) {
                    cm.foldCode(cm.getCursor());
                }
            },
            hintOptions: {
                hint: CodeMirror.hint.anyword,
                completeSingle: false
            },
            gutters: ['CodeMirror-linenumbers', 'CodeMirror-foldgutter'],
            foldGutter: true,
            autoCloseBrackets: true,
            matchBrackets: true,
        });
          // Define language-specific modes
        let modes = {
            'php': 'application/x-httpd-php',
            'javascript': 'text/javascript',
            'html': 'text/html',
            'python': 'text/x-python',
            'bash': 'text/x-sh',
        };


        // Set up mode detection based on code blocks in Markdown
        let markdownMode = 'gfm';
        editor.on('beforeChange', function (instance, changeObj) {
            let startPos = changeObj.from.line;
            let endPos = changeObj.to.line;
            for (let i = startPos; i <= endPos; i++) {
                if (editor.getTokenTypeAt({line: i, ch: 0}) === 'comment') {
                    // Detect code block with triple backticks
                    if (editor.getLine(i).trim() === '```') {
                        let nextLine = editor.getLine(i + 1);
                        if (modes.hasOwnProperty(nextLine)) {
                            markdownMode = modes[nextLine];
                            break;
                        }
                    }
                }
            }
        });

        // Retrieve stored code from local storage
        let storedCode = localStorage.getItem('codeMirrorContent');
        if (storedCode) {
            editor.setValue(storedCode);
        }

        // Save code to local storage on change
        editor.on('change', function() {
            localStorage.setItem('codeMirrorContent', editor.getValue());
        });

        // Set initial mode to Markdown
        // editor.setOption('mode', markdownMode);

        // editor.on('change', function (editor) {
        //     this.set('content', editor.getValue());
        // here at sign
        // });

        editor.on('keydown', function (editor, event) {
            if (event.key === 'F11') {
                editor.setOption('fullScreen', !editor.getOption('fullScreen'));
            }
        });
</script>
@endpush
