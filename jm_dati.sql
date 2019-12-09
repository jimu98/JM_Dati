/*
Navicat MySQL Data Transfer

Source Server         : aaa
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : jm_dati

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2019-11-28 08:30:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for taolun
-- ----------------------------
DROP TABLE IF EXISTS `taolun`;
CREATE TABLE `taolun` (
  `tlid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `text` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`tlid`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of taolun
-- ----------------------------
INSERT INTO `taolun` VALUES ('52', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:37:56');
INSERT INTO `taolun` VALUES ('14', '风龙', '凯波你最帅', '131564894@qq.com', '2019-11-14 11:06:22');
INSERT INTO `taolun` VALUES ('53', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:37:56');
INSERT INTO `taolun` VALUES ('54', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:37:56');
INSERT INTO `taolun` VALUES ('55', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:37:56');
INSERT INTO `taolun` VALUES ('56', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:37:57');
INSERT INTO `taolun` VALUES ('57', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:37:57');
INSERT INTO `taolun` VALUES ('12', '凯波', '风龙你最棒，棒棒哒', 'z591593455@qq.com', '2019-11-14 11:05:19');
INSERT INTO `taolun` VALUES ('41', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:37:50');
INSERT INTO `taolun` VALUES ('42', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:37:53');
INSERT INTO `taolun` VALUES ('43', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:37:53');
INSERT INTO `taolun` VALUES ('44', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:37:54');
INSERT INTO `taolun` VALUES ('45', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:37:54');
INSERT INTO `taolun` VALUES ('46', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:37:54');
INSERT INTO `taolun` VALUES ('47', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:37:55');
INSERT INTO `taolun` VALUES ('48', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:37:55');
INSERT INTO `taolun` VALUES ('49', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:37:55');
INSERT INTO `taolun` VALUES ('34', '凯波', '留言测试', 'z591593455@qq.com', '2019-11-14 16:23:24');
INSERT INTO `taolun` VALUES ('50', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:37:55');
INSERT INTO `taolun` VALUES ('51', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:37:56');
INSERT INTO `taolun` VALUES ('58', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:37:57');
INSERT INTO `taolun` VALUES ('59', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:38:01');
INSERT INTO `taolun` VALUES ('60', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:38:01');
INSERT INTO `taolun` VALUES ('61', '测试', '填满留言板', 'z591593455@qq.com', '2019-11-27 16:38:01');
INSERT INTO `taolun` VALUES ('62', '凯波', '凤龙你最棒', 'z591593455@qq.com', '2019-11-27 16:38:32');
INSERT INTO `taolun` VALUES ('63', '李泰', '凯波你最帅', 'afasdfsdafsa@fad.adsf', '2019-11-27 16:39:06');
INSERT INTO `taolun` VALUES ('64', '凤龙', '李泰你最棒', 'dsfasffasdf@qq.com', '2019-11-27 16:39:39');

-- ----------------------------
-- Table structure for test
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `testid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `type` int(255) DEFAULT NULL,
  `A` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `B` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `C` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `D` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `E` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `answer` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tmid` int(11) DEFAULT NULL,
  PRIMARY KEY (`testid`)
) ENGINE=MyISAM AUTO_INCREMENT=452 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of test
-- ----------------------------
INSERT INTO `test` VALUES ('438', '关于 BGP 的 Keepalive 报文清息的描述，错误的是', '1', 'Keeplive 报文主要用于对等路由器间的运行状态和链路的可用性确认', 'Keeplive 报文的组成只包含一个 BGP 数据报头', 'Keeplive 周期性的在两个 BGP 邻居之间发现', '缺省情况下，Keeplive 的时间间隔是 180s', '', 'D', '1');
INSERT INTO `test` VALUES ('439', ' 关于 IGMP Snooping 工作机制的描述，正确的是:', '1', '如果主机发出的 GMP 离开报文时,交换机将该主机加入到相应的组播中', '如果主机发出的 GMP 主机报告报文时，交换机将删除与该主机对应的组播表项。', '二层交换机通过不断监听 IGMP 报文,在二层建立和维护 MAC 播地址表', '没有运行 IGMP Snooping 时，组播报文将在二层广播,运行 IGMP Snooping 后，报文将不再在二层广播,而是进行二层组播', '', 'D', '1');
INSERT INTO `test` VALUES ('440', 'BGP Speaker 在向 IBGP 对等体发布从 EBGP 对等体学来的路由时，下一条属性设置为', '1', '本地路由器 lookback 地址', '不改变该路由器信息的下一跳属性', '本地与对端建立 IBGP 邻居关系的接口地址', '为本地与学习到此路由的对端建立的 EBGP 邻居关系的接口地址', '', 'B', '1');
INSERT INTO `test` VALUES ('441', '在 SSM 中，需要用到的 IGMP 是哪个版本', '1', 'IGMPv3', 'IGMPv2', 'IGMPv1', 'IGMPv4', '', 'A', '1');
INSERT INTO `test` VALUES ('442', '下面关于 OSPF 报文描述不正确的是', '1', 'hello 报文用于发现和维护邻居关系，在广播网络和 NBMA 网络上的 Hello 报文也用来选举 DR 和 BDR', 'DD 报文通过携带 LSA 头部信息描述链路状态摘要信息', '两台路由器之间发送 HELLO 报文的间隔必须一致，否则邻居无法建立连接', 'DD 报文包含全部的 LSA 信息，可以用于邻居间定期同步链路状态数据库信息', '', 'D', '1');
INSERT INTO `test` VALUES ('443', '下面关于 BGP.OSPF.ISIS.RIP 描述正确的是', '1', 'BGP 邻居关系建立在 TCP 会话基础之上的，采用的器口号是 179', 'OSPF 运行在 IP 协议基础之上，采用的协议号是 90', 'ISIS 运行在 IP 协议基础之上，采用的协议号是 89', 'RIP 运行在 UDP 绘画基础之上', '采用的端口号是 179', 'A', '1');
INSERT INTO `test` VALUES ('445', '这道题选BC', '2', '别选我', '选我', '选我', '选我', null, 'BC', '4');
INSERT INTO `test` VALUES ('446', '选正确', '1', '正确', '错误', null, null, null, 'A', '4');
INSERT INTO `test` VALUES ('3', 'IGMP 版本之间的差异是: (多选)', '2', 'IGMPv1/v2 不能 自己选举查询器，而 IGMPv3 可以。', '对于成员离开，IGMPv2/v3 能够主动离开，而 ICMPv1 不能。', 'IGMPv1/v2/v3 都不能支持 SSM 模型..', 'IGMPvl 不支持特定组查询，而 IGMPv2 支持', '', 'BD', '1');
INSERT INTO `test` VALUES ('5', '关于 OSPF 区域内或者区域间的路由器角色的定义正确的是(多选)', '2', '内部路由器:是指所有接口都属于同一个区域的路由器。', '.ABR:是指连接一个或者多个区域，连接到骨干区域的路由器，并且这些路由器会作为域间通信的路由网关。', '骨干路由器:是指至少有两个接口属于骨干区域的路由器.', 'ASBR:可以是一台内部路由器、骨干路由器或者区域边缘路由器', '', 'ABD', '1');
INSERT INTO `test` VALUES ('6', 'IS-IS 协议所使用的 SNAP 地址主要由哪几个部分构成? (多选)', '2', 'AREA ID', 'DSCP', 'SYSTEM ID', 'SEL', '', 'ACD', '1');
INSERT INTO `test` VALUES ('7', '在静态 LACP 模式中，关于活动链路的选取描述正确的是: (多选)', '2', '在静态 LACP 模式的Eth-Trunk 中加入成员接口后，成员接口将向对端发送系统优先级、系统 MAC、接口优先级、接口号等信息协商活动端口。', '系统 LACP 优先级值越大优先级越高.在两端设备中选择系统 LACP 优先级数值较大端作为主动端，如果系统 LACP 优先级相同则选择 MAC 地址较大的一端作为主动端.', '被动端设备根据主动端接口 LACP 优先级和接口 ID(接口号)确定活动接口。', '两端设备选择的接口不一致，数据也可正常转发', '', 'AC', '1');
INSERT INTO `test` VALUES ('8', '关于组播 RPF 检查，下面说法哪些是错误的? (多选)', '2', '组播 RPF 检查不依赖单播路由。', '所有组播协议都使用 RPF 检查。', '路由器收到组播报文，但 RPF 检查失败，将丢弃收到的组播报文。', 'RPF 检查的作用有 2 个，1 是防止组播路由发生环路; 2 是防止转发冗余的组播数据报文', '', 'AB', '1');
INSERT INTO `test` VALUES ('9', '下面关于 IGMPvl 和 IGMPv2 的描述，正确的是: (多选)', '2', 'IGMPv1 报文类型不包含成员离开报文', 'IGMPv2 报文类型包括成员离开报文', 'IGMPv1 支持普遍组查询', 'IGMPv2 仅支持普遍组查询', '', 'ABC', '1');
INSERT INTO `test` VALUES ('10', 'ISIS 的 Hello 报文主要分为哪几种类型? (多选)', '2', 'Level-1 LAN IIH', 'Level-2 LAN IIH', 'Level-3 LAN IIH', 'P2P LAN IIH', '', 'ABD', '1');
INSERT INTO `test` VALUES ('11', '下面关于 P2MP 网络描述，正确的是: (多选)', '2', '在 P2MP 网络上掩码长度不致的设备不能建立邻居关系，但是可以通过命令 ospf p2mp- mask-ignore 来打破这一限制。', '在 P2MP 网络中需要选举 DR/BDR.', '没有一种链路层协议会被缺省的认为是 P2MP 类型，P2MP 必须是由其他的网络类型强制更改的。', 'P2MP 网络中可以通过命令 filter-lsa-out peer 对发送的 LSA 进行过滤', '', 'ACD', '1');
INSERT INTO `test` VALUES ('12', '访问控制列表可分为如下哪些类别? (多选)', '2', '基本的访问控制列表', '高级的访问控制列表', '二层 ACL', '用户自定义 ACL', '', 'ABCD', '1');
INSERT INTO `test` VALUES ('13', '在组播网络环境中，如果 IGMPv1 主机和 IGMPv2 路由器(以下简称版本 1 主机和版本 2 路由器)共同处于同一局城网当中，他们是如何协同工作的? (多选)', '2', '只要在局域网中存在版本 1 主机，则必须要求所有主机均采用版本 1.', '版本 1 主机发送的成员关系报告总会被版本 2 路由器收到。', '如果版本 1 主机在某个特定组存在时，则版本 2 路由器必须忽略到任何在该组收到的离开消息。', '版本 2 路由器必须设置一个与组相关的考虑到版本 1 主机存在的倒计时器', '', 'BCD', '1');
INSERT INTO `test` VALUES ('14', '在应用策略路由时，下面哪些描述是错误的? (多选)', '2', '在系统视图下应用策略路由，此时的策略路由对通过本路由器收到的所有报文起作用。、', '在系统视图下应用策略路由，此时的策略路由只对本地产生的报文起作用。', '在接口视图下应用策略路由，此时的策略路由只对本接口接收和发送的报文起作用。', '在接口视图下应用策略路由，此时的策略路由只对本接口接收到的报文起作用', '', 'AC', '1');
INSERT INTO `test` VALUES ('17', '*在如图所示的 RSTP 网络中，根据图中对 SWC 的配置，可判断 SWC 的 E0/1 端口的类型是: (多选)', '2', '指定端口', '根端口', '预备端口', '边缘端口', '', 'AD', '1');
INSERT INTO `test` VALUES ('18', '下面哪些 OSPF 状态迁移是正确的? (多选)', '2', 'Loading 状态下发生 Loading Done 事件后的结果是状态迁移到 Full.', 'Exstart 状态下发生 NegotiationDone 事件后的结果是状态迁移到 Full', 'Exchange 状态下发生 ExchangeDone 事件后的结果是状态迁移到 Exstart', 'Exchange 状态下发生 ExchangeDone 事件后的结果是状态迁移到 Loading', '', 'AD', '1');
INSERT INTO `test` VALUES ('19', 'BGP Notification 报文 Error Code 为 2 时表示 OPEN 消息错误，其中包含如下哪些错误子码? (多选)', '2', '1-不支持的版本号', '2-错误的对等体 AS 号', '3-错误的 BGP RID', '4-错误的属性列表', '', 'ABC', '1');
INSERT INTO `test` VALUES ('20', 'Agreate 命令( aggregate ipy4-address { mask | mask-length } [ as-set |attribute- policy route- policy-name1| detail-suppressed | origin-policyroute policy-name2 | suppress policy route-policy- name3])可以通过多种参数控制聚合过程和结果，下面描述错误的是: (多选)', '2', '配置 as-set 参数，生成的聚合路由的 AS-Path 会包含明细路由的所有 AS-Path,该 AS Path 是有序的可用于避免路由环路。', 'suppress-policy 能产生聚合路由，但抑制符合 route-policy 的明细路由向其他邻居通告。可以用 route -policy 的 if-match 子句有选择地抑制一些具体路由，即匹配该策略的路由将被抑制，但其它未通过策略的具体路由不被抑制仍被通告', 'origin policy 选择所有的明细路由来生成聚合路由', 'attribute-policy 用于设置明细路由的属性', '', 'ACD', '1');
INSERT INTO `test` VALUES ('21', '如图所示，路由器 ASBR1( Router ID: 100.0.0.22)引入一条 RIP 路由 10.0.0.0/24.查看路由器 RT1 的 LSDB 有 ASBR1 产生的LS ID 为 10.0.0.0 的 ASELSA，但是 RT1 的路由表却没有对应的路由。请问可能的原因错误的有: (多选)', '2', '路由器 ASBR1 没有向区域 2 产生 LSID 为 100.0.0.22 的 ASBR SUMMARY LSA', '路由器 ABR1 没有向区域 0 产生 LS ID 为 100.0.0.22 的 ASBR SUMMARY LSA', '路由器 ABR2 没有向区域 0 产生 LS ID 为 100.0.0.22 的 ASBR SUMMARY LSA', '路由器 ABR3 没有向区域 1 产生 LS ID 为 100.0.0.22 的 ASBR SUMMARY LSA', '路由器 RT1 没有到转发地址 100.1.1.9 的 OSPF 区域间(Inter-area) 路由', 'BDE', '1');
INSERT INTO `test` VALUES ('22', '关于 LACP 协议的描述，正确的是: (多选)', '2', '基于 IEEE802.3au 标准。', '通过 LACPDU (Link Aggregation Control Protocol Data Unit)与对端交互信息', '两端设备根据系统 LACP 优先级和系统 ID 确定主动端。', '两端设备根据被动端接口 LACP 优先级和接口 ID 确定活动接口', '', 'BC', '1');
INSERT INTO `test` VALUES ('23', '如下哪个工具不能用于路由过滤? (多选)', '2', 'policy-based-route', 'IP-prefix', 'route-policy', 'ip community-filter', '', 'AD', '1');
INSERT INTO `test` VALUES ('24', '关于 OSPF AS External-LSA 说法正确的是: (多 选)', '2', 'Link State ID 被设置为目的网段地址', 'Advertising Router 被设置为 ASBR 的 Router ID', 'Net mask 被设置全 0.', '使用 Link State ID 和 Advertising Router 可以唯一标识条 AS Extermal-LSA', '', 'AB', '1');
INSERT INTO `test` VALUES ('25', '与 OSPF 协议相比，IS-IS 协议具有下列哪几个特点? (多选)', '2', '支持的网络类型较多', '支持的区城类型较多', '协议的可扩展性较好', '协议报文类型较少', '', 'CD', '1');
INSERT INTO `test` VALUES ('26', '关于组播的说法，下列哪些是错误的? (多选)', '2', '单播技术和广播技术不能解决单点发送多点接收的问题，只有组播技术可以解决.', '组播技术应用于大多数的“ 单到多” 数据发布应用', '由于组播技术是基于 TCP 的，所以组播技术能够保证报文的可靠传输', '组播技术可以减少冗余流量、节约网络带帘', '', 'AC', '1');
INSERT INTO `test` VALUES ('450', '这个题选ABC', '2', '选我', '我也选', '选我', '别选我', '', 'ABC', '4');
INSERT INTO `test` VALUES ('451', '这个单选题', '1', '选我', '别选我', '别选我', '别选我', '', 'A', '4');
INSERT INTO `test` VALUES ('109', '关于 BGP 选路规则下面哪些描述是正确的?', '2', '优先选择本地优先级高的路由', '聚合路山优先于非聚合路由', '比较 Origion 属性，依次优选 gn 类型为 EGP、IGP、Incomplete 的路由', '符合等价路由条件的路由中，Cluster-List 长度短者优先', '', 'ABD', '1');
INSERT INTO `test` VALUES ('110', '关于 OSPF 报文描述正确的是(多选)', '2', '在 ExStart 状态下协商主从关系，确认主从关系之后，主路由器发送 DD 报定，从路由器不能主动发送 DD 报文，只能回应主路由器发送到 DD 报文', 'Full 状态说明两路由器的 LSDB 已经同步', 'Loading 状态下路由器相互发送包含链路状态信息摘要的 DD 报文，描述本地 LSDB 内容', '在 ExStart 状态下发送的 DD 报文包含链路状态描述', '', 'AB', '1');
INSERT INTO `test` VALUES ('111', '下面是一段 MUX VLAN 中，关于主 VLAN 和从 VLAN 的配置，关于此配置说法正确的是(多选)', '2', 'VLAN 10 为主 VLAN', 'VLAN 12 为隔离型从 VLAN', 'VLAN 11 为主 VLAN', 'VLAN 11 和 VLAN 12 都为从 VLAN', 'VLAN 10 和 VLAN 11 都为 MUX VLAN', 'ABD', '1');
INSERT INTO `test` VALUES ('447', '是', '2', '对方过后', '森岛帆高', '法国计划', '环境来看', '阿斯蒂芬', 'ABCDE', '4');
INSERT INTO `test` VALUES ('449', '这个题选ABC', '2', '选我', '我也选', '选我', '别选我', '', 'ABC', '4');

-- ----------------------------
-- Table structure for tmlb
-- ----------------------------
DROP TABLE IF EXISTS `tmlb`;
CREATE TABLE `tmlb` (
  `tmid` int(11) NOT NULL,
  `tmlb` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tmlb
-- ----------------------------
INSERT INTO `tmlb` VALUES ('1', '221模拟题');
INSERT INTO `tmlb` VALUES ('2', '222模拟题');
INSERT INTO `tmlb` VALUES ('3', '223模拟题');
INSERT INTO `tmlb` VALUES ('4', '测试试题');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pass` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `zhun` double(255,2) DEFAULT '0.00',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '4921f7dfca05f90dc1f2652bc5a6621e', '2019-11-07 23:00:30', '50.00');
INSERT INTO `user` VALUES ('37', 'ceshi', '9464c3798239e316379036767f0ff7d1', '2019-11-27 16:15:27', '0.00');
INSERT INTO `user` VALUES ('36', '积木', 'eabd8ce9404507aa8c22714d3f5eada9', '2019-11-27 16:13:24', '80.00');
