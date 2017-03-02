
# About Laravel-Vue
#效果图
![image](https://github.com/LaravelChen/laravel-vue/raw/master/public/picture/laravelvue.png)

##项目介绍
####1.采用Laravel5.3和Vue2.0完成的SPA应用，本项目主要采用Vue,Vue-router,Vuex以及一些动画插件.
####2.包括文章的发布，修改，删除，评论，回复，站内通信等功能.
####3.本人采用的是Mac下面的valet的开发环境,比较方便.

##环境要求
>####最好搭建了homestead或者vlate环境，windows的XAMPP之类的集成环境出现错误的自己负责，很有可能是路劲的问题......

##安装步骤
###1.将项目拷贝到本地
```
git clone https://github.com/LaravelChen/laravel-vue.git
```
###2.进入目录
```
cd laravel-vue
```
###3.赋予一些文件夹的权限
```
sudo chmod -R 777 storage bootstrap public  //根据自己的环境自己决定是否执行本命令
```

###4.配置文件
####将目录下的```.env.example```的内容拷贝到```.env```文件，不过这个  ```.env```文件单独创建.然后将相应的数据库配置填好就ok了!

###5.生成相应的依赖
```
composer install
```

###6.安装前端依赖
#####安装 Gulp

```
npm install --global gulp
```
####或者你可以使用 yarn 代替 npm 节省下载安装时间：

```
yarn add global gulp
```
####安装 Laravel Elixir 和 Vuejs 的依赖:
````
npm install
```
####或者
```
yarn
```
###7.编译
####你可以单次编译：
```
gulp
```
####或者你可以监控资源文件修改：
```
gulp watch
```
####当然，你也可以运行所有任务并压缩所有 CSS 及 JavaScript：
```
gulp --production
```
###8.生成数据
```
 php artisan create:data
```
####会生成响应的用户和文章

###9.创建管理员
```
php artisan blog:admin   //按照提示一步步创建您的管理员信息
```

###10.最后希望您能完美的创建成功
