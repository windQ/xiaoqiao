# <?php die(); ?>

## 注意：书写时，缩进不能使用 Tab，必须使用空格

#############################
# 应用程序设置
#############################

# 在这里添加应用程序需要的设置
# 这里的设置可以用 Q::ini('appini/设置名') 来读取，例如 Q::ini('appini/app_title');

columns:
  1: 彩妆培训
  2: 商业合作
  3: 新娘跟妆
  4: 工作室动态
  5: 新闻管理
  6: 作品发布
  
page_size:
  30

#被允许上传的图片格式
img_allowed_types:
  jpg,png,jpeg,gif

#封面图片目录  upload/cover/年月日/栏目id_年月日时分秒_unique.jpg
cover_upload_path:
  upload/cover/

#上传图片配置目录 upload/photo/年月日/栏目id_年月日时分秒_unique.jpg
photo_upload_path:
  upload/photo/

photo_size:
  thumb:
    width: 150
    height: 200
  middle: 
    width: 300
    height: 400