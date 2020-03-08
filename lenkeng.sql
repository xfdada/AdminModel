/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.26 : Database - lenkeng
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lenkeng` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `lenkeng`;

/*Table structure for table `lk_address` */

DROP TABLE IF EXISTS `lk_address`;

CREATE TABLE `lk_address` (
  `addr_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `addr_pro` varchar(50) DEFAULT NULL COMMENT '省',
  `addr_city` varchar(50) DEFAULT NULL COMMENT '市',
  `addr_dist` varchar(50) DEFAULT NULL COMMENT '区',
  `addr_val` varchar(50) DEFAULT NULL COMMENT '地址值',
  `addr_detail` varchar(100) DEFAULT NULL COMMENT '详细地址',
  `addr_phone` varchar(15) DEFAULT NULL COMMENT '收货手机号',
  `addr_time` timestamp NULL DEFAULT NULL COMMENT '添加时间',
  `user_id` int(10) DEFAULT NULL COMMENT '用户id',
  `is_default` tinyint(1) DEFAULT '2' COMMENT '是否默认 1默认 2否',
  PRIMARY KEY (`addr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='收货地址表';

/*Data for the table `lk_address` */

insert  into `lk_address`(`addr_id`,`addr_pro`,`addr_city`,`addr_dist`,`addr_val`,`addr_detail`,`addr_phone`,`addr_time`,`user_id`,`is_default`) values (1,'广东省','深圳市','福田区','','上梅林广夏路3号','13679785541','2020-01-17 10:56:22',1,2);

/*Table structure for table `lk_admin` */

DROP TABLE IF EXISTS `lk_admin`;

CREATE TABLE `lk_admin` (
  `a_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `a_name` varchar(50) DEFAULT NULL COMMENT '用户名',
  `a_pwd` varchar(200) DEFAULT NULL COMMENT '密码',
  `a_count` int(10) DEFAULT NULL COMMENT '登录次数',
  `a_time` timestamp NULL DEFAULT NULL COMMENT '最后登录时间',
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='管理员表';

/*Data for the table `lk_admin` */

insert  into `lk_admin`(`a_id`,`a_name`,`a_pwd`,`a_count`,`a_time`) values (1,'李兴','131413251',1,'2020-02-18 17:14:37');

/*Table structure for table `lk_aftersell` */

DROP TABLE IF EXISTS `lk_aftersell`;

CREATE TABLE `lk_aftersell` (
  `af_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL COMMENT '用户id',
  `o_number` varchar(20) DEFAULT NULL COMMENT '订单号',
  `p_id` int(10) DEFAULT NULL COMMENT '产品id',
  `af_type` tinyint(1) DEFAULT NULL COMMENT '售后类型 1换货 2维修',
  `af_reason` varchar(500) DEFAULT NULL COMMENT '原因',
  `af_img` varchar(500) DEFAULT NULL COMMENT '售后图',
  `is_agree` tinyint(1) DEFAULT '2' COMMENT '是否同意',
  `is_time` tinyint(1) DEFAULT '1' COMMENT '是否质保时间内 1是 2否',
  `af_money` decimal(10,3) DEFAULT NULL COMMENT '维修金额',
  `is_pay` tinyint(1) DEFAULT NULL COMMENT '是否付款 1是 2否',
  `express_number` varchar(20) DEFAULT NULL COMMENT '快递单号',
  `af_time` timestamp NULL DEFAULT NULL COMMENT '申请时间',
  PRIMARY KEY (`af_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='售后表';

/*Data for the table `lk_aftersell` */

insert  into `lk_aftersell`(`af_id`,`user_id`,`o_number`,`p_id`,`af_type`,`af_reason`,`af_img`,`is_agree`,`is_time`,`af_money`,`is_pay`,`express_number`,`af_time`) values (1,1,'LK201455445',2,1,'黑屏',NULL,2,1,'10.000',1,NULL,'2020-02-18 16:37:48');

/*Table structure for table `lk_agent` */

DROP TABLE IF EXISTS `lk_agent`;

CREATE TABLE `lk_agent` (
  `ag_id` int(10) NOT NULL AUTO_INCREMENT,
  `ag_code` varchar(20) DEFAULT NULL COMMENT '代理商编号',
  `ag_type` varchar(20) DEFAULT NULL COMMENT '代理方式',
  PRIMARY KEY (`ag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='代理商表';

/*Data for the table `lk_agent` */

/*Table structure for table `lk_banner` */

DROP TABLE IF EXISTS `lk_banner`;

CREATE TABLE `lk_banner` (
  `ba_id` tinyint(2) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `ba_urls` varchar(100) DEFAULT NULL COMMENT '图片路径',
  `ba_href` varchar(100) DEFAULT NULL COMMENT '点击导航路由',
  `ba_desc` varchar(200) DEFAULT NULL COMMENT 'alt 简介',
  `ba_time` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `ba_index` tinyint(2) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`ba_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='轮播图表';

/*Data for the table `lk_banner` */

insert  into `lk_banner`(`ba_id`,`ba_urls`,`ba_href`,`ba_desc`,`ba_time`,`ba_index`) values (2,'http://www.model.com/product/20200119/2020-01-195e23bdd5c7f38.jpg','/news/172','大师傅大师傅','2020-01-19 10:24:24',1),(3,'http://www.model.com/product/20200119/2020-01-195e23c315412f8.png','/bonih/jis','ces展会地址图','2020-01-19 10:46:47',3);

/*Table structure for table `lk_book` */

DROP TABLE IF EXISTS `lk_book`;

CREATE TABLE `lk_book` (
  `b_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `b_name` varchar(100) DEFAULT NULL COMMENT '产品名称',
  `b_url` varchar(200) DEFAULT NULL COMMENT '路径',
  `pr_id` int(10) DEFAULT NULL COMMENT '产品id',
  `is_down` tinyint(1) DEFAULT '1' COMMENT '是否提供下载 1是 2否',
  `b_time` timestamp NULL DEFAULT NULL COMMENT '上传时间',
  `b_count` int(10) DEFAULT '0' COMMENT '下载次数',
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='说明书表';

/*Data for the table `lk_book` */

insert  into `lk_book`(`b_id`,`b_name`,`b_url`,`pr_id`,`is_down`,`b_time`,`b_count`) values (2,'LK254135','http://www.model.com/book/20200116/2020-01-165e1fc9b25b4f0.doc',4,1,'2020-01-16 10:25:56',0);

/*Table structure for table `lk_cart` */

DROP TABLE IF EXISTS `lk_cart`;

CREATE TABLE `lk_cart` (
  `cart_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '购物车id',
  `user_id` int(10) DEFAULT NULL COMMENT '用户id',
  `cart_content` text COMMENT '购物车内容',
  `cart_time` timestamp NULL DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='购物车表';

/*Data for the table `lk_cart` */

/*Table structure for table `lk_category` */

DROP TABLE IF EXISTS `lk_category`;

CREATE TABLE `lk_category` (
  `c_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `c_name` varchar(100) DEFAULT NULL COMMENT '类别名称',
  `c_pid` int(10) DEFAULT '0' COMMENT '上级分类',
  `c_time` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COMMENT='产品类别表';

/*Data for the table `lk_category` */

insert  into `lk_category`(`c_id`,`c_name`,`c_pid`,`c_time`) values (1,'延长器',0,NULL),(2,'手机延长器',1,NULL),(3,'电视延长器',1,NULL),(4,'手机视频延长器',2,NULL),(5,'视频转接器',0,NULL),(6,'无线视频转接器',5,NULL),(7,'手机无线延长器',2,NULL),(9,'手机',0,'2020-02-17 17:23:55'),(10,'手机无线延长器',9,'2020-02-17 18:08:37'),(11,'电视无线延长器',9,'2020-02-17 18:09:16');

/*Table structure for table `lk_comment` */

DROP TABLE IF EXISTS `lk_comment`;

CREATE TABLE `lk_comment` (
  `cm_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL COMMENT '用户id',
  `p_id` int(10) DEFAULT NULL COMMENT '商品id',
  `o_number` varchar(20) DEFAULT NULL COMMENT '订单号',
  `cm_content` varchar(255) DEFAULT NULL COMMENT '评价内容',
  `cm_img` varchar(255) DEFAULT NULL COMMENT '评价图',
  `cm_time` timestamp NULL DEFAULT NULL COMMENT '评价时间',
  `cm_replay` varchar(255) DEFAULT NULL COMMENT '回复内容',
  `re_time` timestamp NULL DEFAULT NULL COMMENT '回复时间',
  `is_show` tinyint(1) DEFAULT '1' COMMENT '是否显示 1是 2否',
  `cm_score` tinyint(1) DEFAULT NULL COMMENT '评分 1~5之间',
  PRIMARY KEY (`cm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='商品评论表';

/*Data for the table `lk_comment` */

insert  into `lk_comment`(`cm_id`,`user_id`,`p_id`,`o_number`,`cm_content`,`cm_img`,`cm_time`,`cm_replay`,`re_time`,`is_show`,`cm_score`) values (1,1,2,'LK2022445','hahahahhaa',NULL,'2020-02-18 11:54:43','感谢您对本产品的支持','2020-02-18 15:41:24',1,5);

/*Table structure for table `lk_data` */

DROP TABLE IF EXISTS `lk_data`;

CREATE TABLE `lk_data` (
  `d_id` int(10) NOT NULL AUTO_INCREMENT,
  `d_view` int(10) DEFAULT NULL COMMENT '浏览量',
  `d_cart` int(10) DEFAULT NULL COMMENT '添加购物车数量',
  `d_nopay` int(10) DEFAULT NULL COMMENT '未付款数量',
  `d_pay` int(10) DEFAULT NULL COMMENT '已付款量',
  `d_time` date DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='数据统计表';

/*Data for the table `lk_data` */

/*Table structure for table `lk_message` */

DROP TABLE IF EXISTS `lk_message`;

CREATE TABLE `lk_message` (
  `m_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(50) DEFAULT NULL COMMENT '留言邮箱',
  `m_content` varchar(255) DEFAULT NULL COMMENT '留言内容',
  `m_img` varchar(500) DEFAULT NULL COMMENT '留言图片',
  `replay` varchar(500) DEFAULT NULL COMMENT '回复内容',
  `m_time` timestamp NULL DEFAULT NULL COMMENT '留言时间',
  `r_time` timestamp NULL DEFAULT NULL COMMENT '回复时间',
  `is_show` tinyint(1) DEFAULT '1' COMMENT '是否显示 1是 2否',
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='留言信息表';

/*Data for the table `lk_message` */

insert  into `lk_message`(`m_id`,`user_email`,`m_content`,`m_img`,`replay`,`m_time`,`r_time`,`is_show`) values (1,'xiangfudada@163.com','请问LKV686这个型号有说明书吗？',NULL,'您好，请使用 http:www.model.com/book/dshjju','2020-01-19 13:55:42','2020-01-19 15:31:34',1);

/*Table structure for table `lk_migrations` */

DROP TABLE IF EXISTS `lk_migrations`;

CREATE TABLE `lk_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `lk_migrations` */

/*Table structure for table `lk_news` */

DROP TABLE IF EXISTS `lk_news`;

CREATE TABLE `lk_news` (
  `n_id` int(10) NOT NULL AUTO_INCREMENT,
  `n_title` varchar(150) DEFAULT NULL COMMENT '文章标题',
  `n_icon` varchar(200) DEFAULT NULL COMMENT '文章预览图',
  `n_desc` varchar(300) DEFAULT NULL COMMENT '文章简介内容',
  `n_content` longtext COMMENT '文章内容',
  `n_type` tinyint(1) DEFAULT NULL COMMENT '文章类型',
  `n_read` int(11) DEFAULT '0' COMMENT '阅读量',
  `is_show` tinyint(1) DEFAULT '1' COMMENT '是否显示 1 是 2否',
  `top` tinyint(1) DEFAULT '2' COMMENT '是否置顶 1 是 2否',
  `n_time` timestamp NULL DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lk_news` */

insert  into `lk_news`(`n_id`,`n_title`,`n_icon`,`n_desc`,`n_content`,`n_type`,`n_read`,`is_show`,`top`,`n_time`) values (3,'按时发达所发生的','http://www.model.com/product/20200114/2020-01-145e1d2dab19708.jpg','撒的发生大范德萨范德萨规范化的丰厚的规范化地方广东佛山广东佛山割发代首','<p>三等功不打小报告行程都是国防生的返话费的广东省发动</p><p>阿斯顿发大水发啥大发送到东方红白癜风噶莎莎</p><p>撒的发生发大水发</p>',1,0,1,2,'2020-01-14 11:19:06'),(4,'大家好撒旦画','http://www.model.com/product/20200114/2020-01-145e1d3b0a052d0.jpg','阿士大夫IDas','<p>漯河市大覅是范德萨不发达设计费改善并欧尚大哥好ID放大蒜施工方</p>',2,0,1,2,'2020-01-14 11:52:48'),(5,'大家好撒旦画','http://www.model.com/product/20200114/2020-01-145e1d3b0a052d0.jpg','阿士大夫IDas','<p>漯河市大覅是范德萨不发达设计费改善并欧尚大哥好ID放大蒜施工方</p>',2,0,1,2,'2020-01-14 11:53:06'),(6,'大家好撒旦画','http://www.model.com/product/20200114/2020-01-145e1d3b0a052d0.jpg','阿士大夫IDas','<p>漯河市大覅是范德萨不发达设计费改善并欧尚大哥好ID放大蒜施工方</p>',2,0,1,2,'2020-01-14 11:53:44'),(7,'奥术大师多','http://www.model.com/product/20200114/2020-01-145e1d3d00b37e0.jpg','啥打发大水发','<p>是打发鬼地方韩俊虎看价格啥大发送到第三方士大夫是</p>',1,0,1,2,'2020-01-14 12:01:11'),(8,'沙发斯蒂芬','http://www.model.com/product/20200114/2020-01-145e1d3d3abf748.jpg','阿斯顿发大水发是','<p>是打发大水发打算反倒是打算打算的撒</p>',1,0,1,2,'2020-01-15 14:20:46'),(9,'阿斯顿发发生','http://www.model.com/product/20200114/2020-01-145e1d3d4e03f48.jpg','啥打发大水发发大水','<p>啥打发大水发大师傅打算是大多数</p>',1,0,1,2,'2020-01-15 14:19:34');

/*Table structure for table `lk_order` */

DROP TABLE IF EXISTS `lk_order`;

CREATE TABLE `lk_order` (
  `o_id` int(10) NOT NULL AUTO_INCREMENT,
  `o_number` varchar(20) DEFAULT NULL COMMENT '订单号',
  `o_title` varchar(50) DEFAULT NULL COMMENT '订单标题',
  `o_content` text COMMENT '订单内容',
  `user_id` int(10) DEFAULT NULL COMMENT '用户id',
  `o_time` timestamp NULL DEFAULT NULL COMMENT '下单时间',
  `addr_id` int(10) DEFAULT NULL COMMENT '地址id',
  `o_money` decimal(10,3) DEFAULT NULL COMMENT '总价',
  `coupon` decimal(10,3) DEFAULT NULL COMMENT '优惠',
  `is_pay` tinyint(1) DEFAULT '2' COMMENT '是否付款 1已付款 2未付款',
  `pay_time` timestamp NULL DEFAULT NULL COMMENT '付款时间',
  `express_number` varchar(20) DEFAULT NULL COMMENT '快递单号',
  `out_time` timestamp NULL DEFAULT NULL COMMENT '发货时间',
  `is_sure` tinyint(1) DEFAULT '2' COMMENT '是否收到货品 1是 2否',
  `is_delete` tinyint(1) DEFAULT '2' COMMENT '是否删除 1是 2否',
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='订单表';

/*Data for the table `lk_order` */

insert  into `lk_order`(`o_id`,`o_number`,`o_title`,`o_content`,`user_id`,`o_time`,`addr_id`,`o_money`,`coupon`,`is_pay`,`pay_time`,`express_number`,`out_time`,`is_sure`,`is_delete`) values (1,'LK20200117345141','LKMaxtx两件',NULL,1,'2020-01-17 17:34:28',1,'130.000','0.000',2,NULL,NULL,NULL,2,2);

/*Table structure for table `lk_pay` */

DROP TABLE IF EXISTS `lk_pay`;

CREATE TABLE `lk_pay` (
  `pay_id` int(10) NOT NULL AUTO_INCREMENT,
  `pay_money` decimal(10,2) DEFAULT NULL COMMENT '订单金额',
  `pay_order` varchar(20) DEFAULT NULL COMMENT '订单号',
  `pay_type` varchar(20) DEFAULT NULL COMMENT '支付方式',
  `is_pay` tinyint(1) DEFAULT NULL COMMENT '是否支付',
  `pay_time` timestamp NULL DEFAULT NULL COMMENT '生成时间',
  `success_time` timestamp NULL DEFAULT NULL COMMENT '支付时间',
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='支付表';

/*Data for the table `lk_pay` */

insert  into `lk_pay`(`pay_id`,`pay_money`,`pay_order`,`pay_type`,`is_pay`,`pay_time`,`success_time`) values (1,'42.00','LK26555','2',2,'2020-02-20 22:06:18','2020-02-26 22:06:15'),(2,'78.00','LK52125','1',1,'2020-02-26 22:06:46','2020-02-26 22:06:13');

/*Table structure for table `lk_product` */

DROP TABLE IF EXISTS `lk_product`;

CREATE TABLE `lk_product` (
  `p_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '产品id',
  `p_name` varchar(100) DEFAULT NULL COMMENT '产品名称',
  `c_id` int(10) DEFAULT NULL COMMENT '类别id',
  `p_icon` varchar(100) DEFAULT NULL COMMENT '产品缩略图',
  `p_img` varchar(600) DEFAULT NULL COMMENT '产品轮播图',
  `p_desc` varchar(255) DEFAULT NULL COMMENT '产品简介',
  `price` decimal(10,3) DEFAULT NULL COMMENT '原价',
  `now_price` decimal(10,3) DEFAULT NULL COMMENT '当前价格',
  `is_hot` tinyint(1) DEFAULT '1' COMMENT '是否热门 1是 2否',
  `is_new` tinyint(1) DEFAULT '1' COMMENT '是否新品 1是 2否',
  `is_stop` tinyint(1) DEFAULT '2' COMMENT '是否停产 1是 2否',
  `is_show` tinyint(1) DEFAULT '1' COMMENT '是否显示 1是 2否',
  `p_detail` longtext COMMENT '产品详情',
  `p_params` longtext COMMENT '产品参数',
  `p_pack` longtext COMMENT '包装售后',
  `p_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '添加时间',
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='产品表';

/*Data for the table `lk_product` */

insert  into `lk_product`(`p_id`,`p_name`,`c_id`,`p_icon`,`p_img`,`p_desc`,`price`,`now_price`,`is_hot`,`is_new`,`is_stop`,`is_show`,`p_detail`,`p_params`,`p_pack`,`p_time`) values (2,'手机无线延长器',2,NULL,NULL,'这是一张手机无线投屏器',NULL,NULL,1,1,2,1,NULL,NULL,NULL,'2020-02-24 11:22:35'),(3,'LK683',3,NULL,NULL,'这是一款无线路由器',NULL,NULL,1,1,2,1,'<p>这是路由器码</p>','<p>这是连衣裙</p>','<p>这是包装</p>','2020-02-26 21:57:43');

/*Table structure for table `lk_question` */

DROP TABLE IF EXISTS `lk_question`;

CREATE TABLE `lk_question` (
  `q_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `p_id` int(10) DEFAULT NULL COMMENT '所属产品',
  `q_title` varchar(255) DEFAULT NULL COMMENT '产品常见问题',
  `q_answer` longtext COMMENT '解决方法',
  `q_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '添加时间',
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lk_question` */

insert  into `lk_question`(`q_id`,`p_id`,`q_title`,`q_answer`,`q_time`) values (2,2,'手机如何连接改无线连接器','<p>阿斯顿和平分散和哦豁迪欧更好地给拿了快递费年后is</p><p><br/></p><p>大大<br/></p>','2020-02-28 19:50:24');

/*Table structure for table `lk_refund` */

DROP TABLE IF EXISTS `lk_refund`;

CREATE TABLE `lk_refund` (
  `re_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL COMMENT '申请人',
  `o_number` varchar(20) DEFAULT NULL COMMENT '订单号',
  `re_number` varchar(20) DEFAULT NULL COMMENT '退款订单号',
  `re_reason` varchar(255) DEFAULT NULL COMMENT '退款原因',
  `re_product` text COMMENT '退款产品',
  `re_money` decimal(10,3) DEFAULT NULL COMMENT '退款金额',
  `re_time` datetime DEFAULT NULL COMMENT '申请时间',
  `is_agree` tinyint(1) DEFAULT '2' COMMENT '是否同意申请 1是 2否',
  `is_sure` tinyint(1) DEFAULT '2' COMMENT '是否确认退款 1是 2否',
  `operate_admin` int(10) DEFAULT NULL COMMENT '操作员id',
  PRIMARY KEY (`re_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='退货表';

/*Data for the table `lk_refund` */

insert  into `lk_refund`(`re_id`,`user_id`,`o_number`,`re_number`,`re_reason`,`re_product`,`re_money`,`re_time`,`is_agree`,`is_sure`,`operate_admin`) values (1,1,'LK201255','RE20201625','不想买了',NULL,'10.000','2020-02-18 17:03:27',1,2,1);

/*Table structure for table `lk_resource` */

DROP TABLE IF EXISTS `lk_resource`;

CREATE TABLE `lk_resource` (
  `r_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `r_name` varchar(100) DEFAULT NULL COMMENT '固件名称',
  `r_url` varchar(200) DEFAULT NULL COMMENT '路径',
  `pr_id` int(10) DEFAULT NULL COMMENT '产品id',
  `is_down` tinyint(1) DEFAULT '1' COMMENT '是否提供下载 1是 2否',
  `r_time` timestamp NULL DEFAULT NULL COMMENT '上传时间',
  `r_count` int(10) DEFAULT NULL COMMENT '下载次数',
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='固件资源表';

/*Data for the table `lk_resource` */

insert  into `lk_resource`(`r_id`,`r_name`,`r_url`,`pr_id`,`is_down`,`r_time`,`r_count`) values (2,'lk20155454升级包','http://www.model.com/resource/20200116/2020-01-165e2015e83a598.zip',4,2,'2020-01-16 15:51:06',NULL);

/*Table structure for table `lk_user` */

DROP TABLE IF EXISTS `lk_user`;

CREATE TABLE `lk_user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL COMMENT '用户名',
  `user_pwd` varchar(200) DEFAULT NULL COMMENT '密码',
  `phone` varchar(15) DEFAULT NULL COMMENT '电话',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `crate_time` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `status` tinyint(1) DEFAULT '1' COMMENT '账号状态 1正常 2封停',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='用户表';

/*Data for the table `lk_user` */

insert  into `lk_user`(`user_id`,`user_name`,`user_pwd`,`phone`,`email`,`crate_time`,`status`) values (1,'梦想的天空','3165456sadfdasfdsfas','15354254585','25444464@qq.com','2020-01-16 17:16:35',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
