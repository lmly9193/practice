# passwd

```shell
$ passwd --help
Usage: passwd [options] [LOGIN]

Options:
  -a, --all                     report password status on all accounts
  -d, --delete                  delete the password for the named account
  -e, --expire                  force expire the password for the named account
  -h, --help                    display this help message and exit
  -k, --keep-tokens             change password only if expired
  -i, --inactive INACTIVE       set password inactive after expiration to INACTIVE
  -l, --lock                    lock the password of the named account
  -n, --mindays MIN_DAYS        set minimum number of days before password change to  MIN_DAYS
  -q, --quiet                   quiet mode
  -r, --repository REPOSITORY   change password in REPOSITORY repository
  -R, --root CHROOT_DIR         directory to chroot into
  -S, --status                  report password status on the named account
  -u, --unlock                  unlock the password of the named account
  -w, --warndays WARN_DAYS      set expiration warning days to WARN_DAYS
  -x, --maxdays MAX_DAYS        set maximum number of days before password change to MAX_DAYS
```

## 修改密碼(自己)

```shell
$ passwd
```

## 修改密碼(其他使用者)

```shell
$ passwd username
```

## 查看用戶狀態

```shell
$ passwd -S username
```

## 修改群組密碼

```shell
passwd -g GroupName
```

## 列出所有帳號

```shell
cat /etc/passwd
```

