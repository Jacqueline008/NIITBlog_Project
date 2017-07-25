# NIITBlog_Project概要设计文档
****
##### 备注:        NIIT印度游学参赛项目
##### 作者:        李艺鸣
##### 项目在线地址: http://182.254.152.14/phpStorm_Project/NIITBlog_Project/html/NIITHome.html 
##### 项目讲解视频在线观看: (优酷) http://v.youku.com/v_show/id_XMjkxNzc5ODI4MA==.html?spm=a2hzp.8253869.0.0
##### 项目讲解视频在线观看: (百度云)https://pan.baidu.com/s/1dEDkrtf
****
## 目录
* [引言](#引言)
    * 网站概述
* [系统分析](#系统分析)
    * 问题陈述
    * 系统用例分析
    * 用例规约
      * 注册用例
      * 登录用例
      * 博文评论用例
      * 关注博主用例
      * 发私信用例
      * 博文发表用例
      * 查看博文用例
      * 博文删除用例
      * 个人信息维护用例
      * 博文管理用例
* [系统运行截图](#系统运行截图)
    * 截图持续更新中...

### 引言
****
#### 网站概述
```
NIIT学生个人博客网站是一个致力于为NIIT注册会员提供博客撰写与博文分享的网站
该网站提供简洁的界面给用户带来纯粹的知识分享与交流体验
```
### 系统分析
****
#### 问题陈述
```
访客的功能：   普通访客可以通过注册成为本网站的会员，在登录之前普通访客可以阅读博文，
              登录之后普通访客可以进行博文评论，关注博主，发私信，点赞与打赏。
博主的功能：   博主通过登录后进入本网站，博主可以发表博文，并且可以查看自己所有的博文
              列表以及分类查看自己的博文列表，同时博主可以删除自己发表的博文，
              博主还可以进行关注管理，私信管理，个人信息维护。
管理员的功能： 管理员登录后可以进行用户管理以及博文管理，筛选出有敏感信息的博文。
```
#### 系统用例分析
<img src="https://github.com/Jacqueline008/NIITBlog_Project/blob/master/%E9%A1%B9%E7%9B%AE%E6%96%87%E6%A1%A3%E6%89%80%E9%9C%80%E6%96%87%E4%BB%B6/%E8%AE%BF%E5%AE%A2%E7%94%A8%E4%BE%8B%E5%9B%BE.jpg" width="200" height="200"/>
<img src="https://github.com/Jacqueline008/NIITBlog_Project/blob/master/%E9%A1%B9%E7%9B%AE%E6%96%87%E6%A1%A3%E6%89%80%E9%9C%80%E6%96%87%E4%BB%B6/%E5%8D%9A%E4%B8%BB%E7%94%A8%E4%BE%8B%E5%9B%BE.jpg" width="200" height="200"/>
<img src="https://github.com/Jacqueline008/NIITBlog_Project/blob/master/%E9%A1%B9%E7%9B%AE%E6%96%87%E6%A1%A3%E6%89%80%E9%9C%80%E6%96%87%E4%BB%B6/%E7%AE%A1%E7%90%86%E5%91%98%E7%94%A8%E4%BE%8B%E5%9B%BE.jpg" width="200" height="200"/>


#### 用例规约
##### 注册用例
```
1.简要说明：
本用例用于向用户和管理员提供注册功能，用户注册后才能发表博客，管理员注册后才能登录并管理。注册信息包括使用本系统的用户名，密码，手机号。注册完成后，系统保存这些信息。

2.事件流：
2.1基本流：
当用户或管理员进行注册时，开始执行以下基本流：
（1）系统要求填写用户名，密码，手机号。
（2）用户或管理员填写个人信息。
（3）系统验证用户或管理员的信息。
（4）保存用户或管理员的信息。
（5）向用户或管理员显示注册成功。
2.2备选流：
用户或管理员信息保存失败：
若系统中已经存在相同用户名，则保存信息失败，系统向用户显示注册失败。

3.前置条件：
用户或管理员必须首先访问网站的主页，单击登录，单击注册。

4.后置条件：
如果该用例成功，系统数据库USER表中将增加一条该用户的信息。否则系统维持现状。
```

##### 登录用例
```
1.简要说明：
本用例用于向用户和管理员提供登录功能，用户或管理员需要提供用户名和密码。

2.事件流：
2.1基本流：
当用户或管理员进行登陆时，开始执行以下基本流：
（1）系统要求填写用户名和密码
（2）用户或管理员填写个人信息
（3）系统验证个人信息。
（4）登录成功，跳转到首页
2.2备选流：
2.2.1 用户或管理员输入的用户名未注册
登录页面展示错误信息
2.2.2 用户或管理员输入的密码错误
登录页面展示错误信息

3.前置条件：
用户或管理员必须首先注册该网站。

4.后置条件：
如果该用例成功，系统会跳转到首页，并在页头显示用户名。
```

##### 评论博文用例
```
1.简要说明：
本用例用于向登录用户提供评论博文功能

2.事件流：
当用户进行博文评论时，开始执行以下基本流：
（1）系统向用户提供博文评论区
（2）用户输入自己的评论并提交
（3）系统向用户展示自己的评论已经显示在网页

3.前置条件：
用户必须首先登录该网站。

4.后置条件：
如果该用例成功，系统的评论表中会多一条信息。
```


##### 关注博主用例
```
1.简要说明：
本用例用于向登录用户提供关注博主功能。

2.事件流：
当用户进行关注时，开始执行以下基本流：
（1）系统向用户提供关注博主按钮
（2）用户点击
（3）系统向用户展示已关注字样

3.前置条件：
用户必须首先登录该网站。

4.后置条件：
如果该用例成功，系统的关注表中会多一条信息。
```
##### 发私信用例
```
1.简要说明：
本用例用于向登录用户提供向指定博主发私信功能。

2.事件流：
当用户进行发私信时，开始执行以下基本流：
（1）系统向用户提供关注发私信按钮
（2）用户点击
（3）系统跳转到发私信界面
（4）用户输入私信内容
（5）系统向用户显示私信发送成功

3.前置条件：
用户必须首先登录该网站。

4.后置条件：
如果该用例成功，系统的私信表中会多一条信息。
```

##### 博文发表用例
```
1.简要说明：
本用例用于向登录用户提供向博文发表功能。

2.事件流：
当用户进行博文发表时，开始执行以下基本流：
（1）系统向用户提供博文标题，博文内容输入去
（2）用户输入博文并点击提交
（3）系统向用户展示博文发表成功

3.前置条件：
用户必须首先登录该网站。

4.后置条件：
如果该用例成功，系统的博文表中会多一条信息。
```

##### 查看博文用例
```
1.简要说明：
本用例用于向登录用户提供博文查看功能。

2.事件流：
当用户进行博文查看时，开始执行以下基本流：
（1）系统向用户提供博文管理界面
（2）用户可以根据博文分类查看自己发表的博文
（3）系统向用户展示博文

3.前置条件：
用户必须首先登录该网站。
```
##### 博文删除用例
```
1.简要说明：
本用例用于向登录用户提供向博文删除功能。

2.事件流：
当用户进行博文删除时，开始执行以下基本流：
（1）系统向用户提供博文列表
（2）用户点击相应的博文列表中的删除按钮
（3）系统向用户展示博文删除成功

3.前置条件：
用户必须首先登录该网站。

4.后置条件：
如果该用例成功，系统的博文表会更新。
```

##### 个人信息维护用例
```
1.简要说明：
本用例用于向登录用户提供个人信息维护功能。

2.事件流：
当用户进行个人信息维护时，开始执行以下基本流：
（1）系统向用户提供个人信息
（2）用户在相应的编辑区编辑自己的资料并点击提交
（3）系统向用户展示资料修改成功

3.前置条件：
用户必须首先登录该网站。

4.后置条件：
如果该用例成功，系统的用户表会更新。
```

##### 博文管理用例
```
1.简要说明：
本用例用于向管理员提供博文管理功能。

2.事件流：
当管理员进行博文管理时，开始执行以下基本流：
（1）系统向管理员提供博文敏感信息搜索框
（2）管理员输入敏感词汇
（3）系统向管理员展示敏感词汇的博文列表
（4）管理员点击删除相应的博文

3.前置条件：
管理员必须首先登录该网站。

4.后置条件：
如果该用例成功，系统的博文会更新。
```

### 系统运行截图
***
#### 注册界面
<img src="https://github.com/Jacqueline008/NIITBlog_Project/blob/master/%E9%A1%B9%E7%9B%AE%E6%96%87%E6%A1%A3%E6%89%80%E9%9C%80%E6%96%87%E4%BB%B6/%E6%B3%A8%E5%86%8C%E7%95%8C%E9%9D%A2.PNG">

#### 登录界面
<img src="https://github.com/Jacqueline008/NIITBlog_Project/blob/master/%E9%A1%B9%E7%9B%AE%E6%96%87%E6%A1%A3%E6%89%80%E9%9C%80%E6%96%87%E4%BB%B6/%E7%99%BB%E5%BD%95%E9%A1%B5%E9%9D%A2.PNG">

#### 写博客界面
<img src="https://github.com/Jacqueline008/NIITBlog_Project/blob/master/%E9%A1%B9%E7%9B%AE%E6%96%87%E6%A1%A3%E6%89%80%E9%9C%80%E6%96%87%E4%BB%B6/%E5%86%99%E5%8D%9A%E6%96%87%E9%A1%B5%E9%9D%A2.PNG">
<img src="https://github.com/Jacqueline008/NIITBlog_Project/blob/master/%E9%A1%B9%E7%9B%AE%E6%96%87%E6%A1%A3%E6%89%80%E9%9C%80%E6%96%87%E4%BB%B6/%E5%86%99%E5%8D%9A%E6%96%87-%E7%A7%BB%E5%8A%A8.PNG" width="180px" height="280px">






















