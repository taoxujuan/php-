/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : weixin

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-12-01 10:03:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `com_category`
-- ----------------------------
DROP TABLE IF EXISTS `com_category`;
CREATE TABLE `com_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_code` varchar(16) NOT NULL DEFAULT '00',
  `category_name` varchar(16) NOT NULL COMMENT '类目名称',
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_code` (`category_code`)
) ENGINE=InnoDB AUTO_INCREMENT=1567 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of com_category
-- ----------------------------
INSERT INTO `com_category` VALUES ('829', '0101', '蔬菜');
INSERT INTO `com_category` VALUES ('839', '0106', '水果');
INSERT INTO `com_category` VALUES ('852', '0201', '烘焙糕点');
INSERT INTO `com_category` VALUES ('854', '0202', '关东煮');
INSERT INTO `com_category` VALUES ('856', '0203', '美食快餐');
INSERT INTO `com_category` VALUES ('862', '0301', '奶品');
INSERT INTO `com_category` VALUES ('875', '0303', '冷藏饮品');
INSERT INTO `com_category` VALUES ('880', '0304', '冷藏肉制品');
INSERT INTO `com_category` VALUES ('890', '0306', '冷藏海产品');
INSERT INTO `com_category` VALUES ('898', '0308', '冷藏粉面米制品');
INSERT INTO `com_category` VALUES ('932', '0314', '雪糕');
INSERT INTO `com_category` VALUES ('947', '0401', '国产烟');
INSERT INTO `com_category` VALUES ('954', '0403', '洋酒');
INSERT INTO `com_category` VALUES ('962', '0404', '葡萄酒');
INSERT INTO `com_category` VALUES ('968', '0405', '白酒');
INSERT INTO `com_category` VALUES ('972', '0406', '黄酒');
INSERT INTO `com_category` VALUES ('976', '0407', '啤酒');
INSERT INTO `com_category` VALUES ('983', '0409', '纯奶');
INSERT INTO `com_category` VALUES ('987', '0410', '风味奶');
INSERT INTO `com_category` VALUES ('997', '0412', '儿童奶');
INSERT INTO `com_category` VALUES ('1000', '0413', '植物蛋白饮料');
INSERT INTO `com_category` VALUES ('1004', '0414', '果汁');
INSERT INTO `com_category` VALUES ('1011', '0415', '果味饮料');
INSERT INTO `com_category` VALUES ('1022', '0416', '碳酸饮料');
INSERT INTO `com_category` VALUES ('1029', '0417', '茶饮料');
INSERT INTO `com_category` VALUES ('1038', '0418', '功能性饮料');
INSERT INTO `com_category` VALUES ('1043', '0419', '饮用水');
INSERT INTO `com_category` VALUES ('1051', '0501', '单种植物油');
INSERT INTO `com_category` VALUES ('1060', '0502', '调和油');
INSERT INTO `com_category` VALUES ('1066', '0503', '大米');
INSERT INTO `com_category` VALUES ('1072', '0504', '面粉');
INSERT INTO `com_category` VALUES ('1077', '0505', '面条');
INSERT INTO `com_category` VALUES ('1082', '0506', '米粉');
INSERT INTO `com_category` VALUES ('1084', '0507', '农副土产');
INSERT INTO `com_category` VALUES ('1101', '0510', '酱油');
INSERT INTO `com_category` VALUES ('1106', '0511', '调味汁');
INSERT INTO `com_category` VALUES ('1113', '0512', '醋');
INSERT INTO `com_category` VALUES ('1119', '0513', '调味酱');
INSERT INTO `com_category` VALUES ('1134', '0514', '酱菜');
INSERT INTO `com_category` VALUES ('1142', '0515', '调味粉');
INSERT INTO `com_category` VALUES ('1157', '0516', '糖');
INSERT INTO `com_category` VALUES ('1163', '0601', '即食商品');
INSERT INTO `com_category` VALUES ('1170', '0602', '火腿肠');
INSERT INTO `com_category` VALUES ('1177', '0604', '罐头');
INSERT INTO `com_category` VALUES ('1185', '0606', '早餐食品');
INSERT INTO `com_category` VALUES ('1190', '0607', '冲调食品');
INSERT INTO `com_category` VALUES ('1202', '0702', '蜂蜜');
INSERT INTO `com_category` VALUES ('1212', '0704', '咖啡');
INSERT INTO `com_category` VALUES ('1217', '0705', '茶叶');
INSERT INTO `com_category` VALUES ('1230', '0707', '奶粉');
INSERT INTO `com_category` VALUES ('1238', '0708', '婴儿食品');
INSERT INTO `com_category` VALUES ('1247', '0801', '坚果炒货');
INSERT INTO `com_category` VALUES ('1249', '0802', '肉类熟食');
INSERT INTO `com_category` VALUES ('1251', '0803', '蜜饯果干');
INSERT INTO `com_category` VALUES ('1253', '0804', '香脆食品');
INSERT INTO `com_category` VALUES ('1255', '0805', '水产零食');
INSERT INTO `com_category` VALUES ('1257', '0806', '豆干素食');
INSERT INTO `com_category` VALUES ('1259', '0807', '饼干');
INSERT INTO `com_category` VALUES ('1261', '0808', '面包糕点');
INSERT INTO `com_category` VALUES ('1263', '0809', '果冻');
INSERT INTO `com_category` VALUES ('1265', '0810', '糖果巧克力');
INSERT INTO `com_category` VALUES ('1284', '0904', '进口饮料');
INSERT INTO `com_category` VALUES ('1298', '0907', '进口方便食品');
INSERT INTO `com_category` VALUES ('1305', '0909', '进口饼干');
INSERT INTO `com_category` VALUES ('1313', '0910', '进口小食');
INSERT INTO `com_category` VALUES ('1324', '1001', '洗发护发');
INSERT INTO `com_category` VALUES ('1329', '1002', '洗浴工具');
INSERT INTO `com_category` VALUES ('1332', '1003', '美发用品');
INSERT INTO `com_category` VALUES ('1334', '1004', '洗浴护肤');
INSERT INTO `com_category` VALUES ('1338', '1005', '其它沐浴用品');
INSERT INTO `com_category` VALUES ('1343', '1006', '婴儿护理用品');
INSERT INTO `com_category` VALUES ('1348', '1007', '面部清洁');
INSERT INTO `com_category` VALUES ('1351', '1008', '面部滋润护理');
INSERT INTO `com_category` VALUES ('1356', '1009', '身体护理');
INSERT INTO `com_category` VALUES ('1361', '1010', '男士护理');
INSERT INTO `com_category` VALUES ('1364', '1011', '剃须用品');
INSERT INTO `com_category` VALUES ('1368', '1012', '计生用品');
INSERT INTO `com_category` VALUES ('1372', '1013', '健康护理');
INSERT INTO `com_category` VALUES ('1375', '1014', '面膜');
INSERT INTO `com_category` VALUES ('1382', '1016', '牙膏');
INSERT INTO `com_category` VALUES ('1389', '1017', '牙刷');
INSERT INTO `com_category` VALUES ('1392', '1018', '其它口腔护理');
INSERT INTO `com_category` VALUES ('1399', '1101', '卫生纸');
INSERT INTO `com_category` VALUES ('1409', '1102', '女士用品');
INSERT INTO `com_category` VALUES ('1420', '1104', '衣物清洁');
INSERT INTO `com_category` VALUES ('1428', '1105', '厨厕清洁');
INSERT INTO `com_category` VALUES ('1438', '1201', '厨房小件');
INSERT INTO `com_category` VALUES ('1450', '1202', '生活小件');
INSERT INTO `com_category` VALUES ('1458', '1203', '一次性用品');
INSERT INTO `com_category` VALUES ('1466', '1204', '生活小工具');
INSERT INTO `com_category` VALUES ('1481', '1205', '宠物用品');
INSERT INTO `com_category` VALUES ('1488', '1206', '其他生活百货');
INSERT INTO `com_category` VALUES ('1495', '1207', '儿童玩具');
INSERT INTO `com_category` VALUES ('1509', '1208', '桌面文具');
INSERT INTO `com_category` VALUES ('1537', '1209', '配件');
INSERT INTO `com_category` VALUES ('1543', '1210', '雨伞雨具');
INSERT INTO `com_category` VALUES ('1547', '1211', '杀虫灭蚊');
INSERT INTO `com_category` VALUES ('1551', '1212', '家纺百货');
