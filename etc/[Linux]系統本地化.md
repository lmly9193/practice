## 交互式

```shell
dpkg-reconfigure tzdata
dpkg-reconfigure locales
```

## 非交互

```shell
tzselect
echo "" >> .bashrc
echo "export LC_ALL=zh_TW.UTF-8" >> .profile
echo "export LANG=zh_TW.UTF-8" >> .profile
echo "export LANGUAGE=zh_TW.UTF-8" >> .profile
echo "export TZ='Asia/Taipei'" >> .profile
```
