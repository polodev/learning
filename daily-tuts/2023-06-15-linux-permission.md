https://www.youtube.com/watch?v=TTwipuG1p7k&ab_channel=AHTCloud

# 
permission string 
10 characters divided by 4 parts
1.(-)[file type]
2.(---) [owner permission]
3.(---) [group permission]
4.(---) [other permission]

## 1. file types 
|Type | Description |
| -- | -- |
|`-` | Regular File  |
|`d` | Directory |
|`c` | Character Device file |
|`b` | Block device file  |
|`s` | Local Socket file |
|`p` | Named pipe |
|`I` | Symbolic link |

## 2. Owner Permission, 3. Group Permission, 4. Others Permission
`---`

* type - description
* `-` - No Permission for files; Directory content  cannot be shown.
* `r` - Read Permission for files; Directory content  can be shown.
* `w` - Write Permission for files; Directory content  can be altered.
* `x` - Execute Permission for files; Directory can be navigated too using cd

# Changing permission 

The `chmod` command is used to set permissions.   
To use `chmod`, you need to specify 3 things     
1. Scope, 2. Action, 3. Permission    

```bash
chmod a=rwx
```
Here 
1. `a` is Scope
2. `=` is Action
3. `rwx` is Permission

| Scope ||
| -- | ------------- |
| u  | User - owner of the file  |
| g  | Group  |
| o  | Others - User not owner and not in group  |
| a  | All  |


| Action ||
| -- | ------------- |
| `-`  | Remove Permission |
| `+`  | Add Permission  |
| `=`  | Replace Permission |


| Permission ||
| -- | -------- |
| `r`  | Read |
| `w`  | Write |
| `x`  | Execute |

```bash
chmod u+x example.txt
u = scope
+ = action
x = permission
```

```bash
chmod a-rwx
a = scope
- = action
rwx = permission
```

```bash
chmod g=rwx example.txt
chmod o=rwx example.txt

```


