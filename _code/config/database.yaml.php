# <?php die(); ?>

## 注意：书写时，缩进不能使用 Tab，必须使用空格

#############################
# 数据库设置
#############################

# devel 模式
devel:
  driver:     mysql
  host:       localhost
  login:      username
  password:   password
  database:   xiaoqiao2_devel_db
  charset:    utf8
  prefix:

# test 模式
test:
  driver:     mysql
  host:       localhost
  login:      username
  password:   password
  database:   xiaoqiao2_test_db
  charset:    utf8
  prefix:

# deploy 模式
deploy:
  driver:     mysql
  host:       localhost
  login:      username
  password:   password
  database:   xiaoqiao2_db
  charset:    utf8
  prefix:

