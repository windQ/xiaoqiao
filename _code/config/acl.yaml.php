# <?php die(); ?>

## 注意：书写时，缩进不能使用 Tab，必须使用空格。并且各条访问规则之间不能留有空行。

#############################
# 访问规则
#############################

# 访问规则示例
#

admin:
  allow: admin,super_admin
  actions:
    login:
      allow: ACL_EVERYONE
    index:
      allow: ACL_EVERYONE