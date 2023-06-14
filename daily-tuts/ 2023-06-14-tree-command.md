# tree command basic usages 

### to find anything use grep pipe

```
tree | grep "my word"
```

with full path Use tree's pattern matching (`-P`) in combination with `--prune`:

tree -P 'my word' --prune 