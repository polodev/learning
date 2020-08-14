# working on enableSeries
# working on enableSeriesContent

      {{ if or ($.Param "enableSeries") ($.Param "series") }}
        <div class="toc__flexbox--outer" data-position="fixed" data-dir="ltr" data-ani="{{ $.Site.Params.enableUiAnimation | default "true" }}">
          <h6 class="toc__title toc__title--outer" data-ani="{{ $.Site.Params.enableUiAnimation | default "true" }}">
            List of Post Under 
            {{ range (.GetTerms "series") }}
              <a href="{{ .Permalink }}" class="single__tag" title="{{ .LinkTitle }}">{{ .LinkTitle }}</a>
            {{ end }}
             Series
          </h6>
          {{ if $.Param "enableTocSwitch" }}
          <label class="switch" data-ani="{{ $.Site.Params.enableUiAnimation | default "true" }}">
            <input id="visible-series" aria-label="Visible TOC" type="checkbox" {{ if $.Param "hideToc" }}{{ else }}checked{{ end }}>
            <span class="slider round"></span>
          </label>
          {{ end }}
        </div>
        <div class="toc series toc__outer {{ if $.Param "hideToc" }}hide{{ end }}" data-dir="ltr" data-folding="{{ if $.Param "tocFolding" }}true{{ else }}false{{ end }}" data-ani="{{ $.Site.Params.enableUiAnimation | default "true" }}">
          {{ .TableOfContents }}
        </div>
      {{ end }}
