/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : boke

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 09/07/2020 13:33:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for qw_article
-- ----------------------------
DROP TABLE IF EXISTS `qw_article`;
CREATE TABLE `qw_article`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `art_title` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '文章标题',
  `art_tag` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '文章标签关键词',
  `art_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '文章描述',
  `art_thumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '文章缩略图',
  `art_content` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '文章内容',
  `art_time` datetime DEFAULT NULL COMMENT '文章发布时间',
  `art_editor` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '文章作者',
  `art_view` int(11) DEFAULT 0 COMMENT '文章浏览次数',
  `cate_id` int(11) DEFAULT NULL COMMENT '文章分类ID',
  `art_status` int(11) DEFAULT 2 COMMENT '文章是否加入推荐位 1是2否',
  `art_love` int(11) DEFAULT 0 COMMENT '文章点赞数',
  `art_collect` int(11) DEFAULT 0 COMMENT '文章收藏量',
  `art_pinglun` int(11) DEFAULT 0 COMMENT '文章评论数',
  `thumball` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '多图片',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 52 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '文章表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qw_article
-- ----------------------------
INSERT INTO `qw_article` VALUES (16, '文章三', '文章三', '文章三', 'uploads/2020-05-07/9HTYafPn9U18KxsmUamBKVo2h49zkOSwJJsgwCXg.jpeg', '<p>文章三文章三</p>', '2020-05-07 08:53:12', '文章三', 0, 6, 2, 1, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (17, '文章一', '文章一', '文章一', 'uploads/2020-05-07/tVlZjEyFyvlUlaO9HLLHnLq1FKt6WOBvwaxUZKNa.jpeg', '<p>文章一</p>', '2020-05-07 09:16:12', '文章一', 0, 10, 1, 1, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (15, '文章二', '文章二', '文章二', 'uploads/2020-05-07/nj01ANBZlZmUv1xpelVyAeGcCUNI1Fk2i37s6APv.jpeg', '<p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">当金正恩上台的时候，外面的世界对这个不到30岁的年轻人还有些期待，希望有西方留学经历的他能为这个破败不堪的国家带去一些朝气，然而他除了把自己吃得越来越胖并娶了个貌美如花的乐团主唱之外，还大肆清洗对自己不敬的前朝元老，甚至传出了当众“炮决”“犬决”“机关枪扫射”等骇人听闻的杀人手段。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">更让外界感到忧虑的是，他带领下的朝鲜在“宇宙第一强国”的道路上越走越远，金正恩上任5年来射出去的导弹超过了此前几十年的总和，从今年年初到现在已经进行了两次核爆。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">如今的金正恩已经脱去了上台之初的一脸稚气，他指挥发射导弹核试验、视察军队、工地、渔场甚至养猪厂时开心大笑的照片频频登上国际媒体的版面，这是他在对外展现人民拥戴和政权稳固的自信。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\"><a href=\"http://www.boke.com/detail/images/jinzhengen.jpg\" class=\"prettyPhoto_gall\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; vertical-align: baseline; background: transparent; list-style: none; color: rgb(66, 139, 202); transition: all 0.2s ease 0s; cursor: pointer;\"><img class=\"aligncenter size-full wp-image-5137\" src=\"http://www.boke.com/Home1/images/jinzhengen.jpg\" alt=\"金正恩\" title=\"这么多大国，为什么治不了一个朝鲜？\" width=\"547\" height=\"381\"/></a></p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">如果说前几次朝鲜核试验外界还是怀疑他的核技术，那么第五次核爆清楚地告诉世人，如果继续这样下去，朝鲜拿出可以打到美国本土的战略核导弹只是个时间问题，打到中日韩就更不用说了。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">朝鲜在研制核武器的道路上，只用了一个策略：明修栈道，暗度陈仓，嘴上反复说放弃，甚至还炸过冷却塔、允许国际组织进去核查，但实际上从来也没有住手；在六方会谈中也出尔反尔，签了停核协议，没几年就撕毁，宣布自己已是拥核国家，还要求大家都承认。在国际社会上，基本没有什么信誉可言。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">连肚子都填不饱，为什么还要一意孤行搞这些“大杀器”？朝鲜的行为常常令外界感到困惑。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">要知道朝鲜人脑子里装的什么，就要了解朝鲜这台国家机器的灵魂——主体思想，它控制了从国家领袖、党国精英直至大头百姓的一切行动。朝鲜的说法是，领袖是大脑，党和军队、政府是手足，人民是躯干，领袖指哪儿就打哪儿。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">“主体思想”是朝鲜开国领袖金日成创立的，地位相当于中国的“毛泽东思想”（水平高低另当别论），后被写入朝鲜宪法，成为国家和人民唯一的活动指导理论，至高无上。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">主体思想被确立为朝鲜的立国之本，核心可以概括为四个字：独立、自主。“主体”的意思就是以朝鲜自己为主体，政治上自主、经济上自足、国防上自卫。简单说，就是谁都不能信，只能靠自己。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">在外界看来是不守承诺，但在朝鲜看来，这就是主体思想的体现，谁的面子也不给，我自己决定自己的命运，爱怎么来怎么来，谁也管不着。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">朝鲜从战后直到80年代末取得的经济建设成就，为主体思想提供了合法性，然而到了90年代，因为苏联解体和东欧剧变，外来援助断绝，朝鲜国内经济急剧恶化，发生持续数年的饥荒，为了稳定政权，朝鲜领导人金正日在主体思想的基础上提出“先军政治”：一切工作都围绕军队展开，有限的资源要优先保障军队。只要控制好军队，对外保持武力威慑，对内确保政权根基稳固，因此即便发生大饥荒，朝鲜国内也没有发生动乱。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">朝鲜军队目前保持在110万人左右，数量仅次于中美印排第四位，军民比例世界第一。军队在朝鲜政治生活当中地位很高，生活待遇、政治待遇、社会声誉比工人、知识分子都好，年轻人一般都喜欢当兵，年轻的姑娘想找对象，也喜欢找军人。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">先军政治的逻辑就是，要先实现的独立自主地生存下去，然后再讨论生活的问题，小孩从小就被教育“没有糖果可以活下去，没有子弹就不能生存”。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">朝鲜最高领导人也多次公开表示“先军政治就是万能宝剑”，强化先军政治也是金氏政权维持合法性的唯一手段，一旦搞出核武器，对内可以证明先军思想和领袖的伟大英明，振奋民心，给人灌输“我日子过得没你好，但我比你厉害”的精神鸦片。对外，则可以此作为筹码，向国际社会要粮食要原油，反正光脚的不怕穿鞋的，大不了同归于尽。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">在朝鲜，主体思想和先军政治无处不在，比如朝鲜不使用公元纪年，而是使用主体纪年，以金日成诞生的1912年为主体元年，今年是主体105年；平壤地标叫“主体思想塔”，在日常生活中，主体思想标语随处可见。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">由于没有签订终战和平条约，理论上，朝鲜半岛是世界上不多的仍然处于战争状态的地方，官方宣传中，将美国、韩国、日本树立成无时不在的敌人，现在偶尔也指桑骂槐地捎上中国。这种几十年如一日洗脑式的宣传是成功的，普通民众对领袖的爱戴与宗教信仰几乎没有分别：</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">与主体思想相对的是，朝鲜从金日成至今，都坚决抵制“事大主义”，“事大”就小国侍奉大国以保存自身的策略。古代的朝鲜王朝从中国明初到清末，一直奉行“事大交邻”的政策，“事大”就是侍奉中原王朝，“交邻”则是指与日本等邻国的往来。因此“北不失礼，南不失信”成为朝鲜王朝的祖训，而“事大”则成为朝鲜对华政策的代名词。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">“事大”显然与主体思想是矛盾的，不论是朝鲜上世纪50年代对曾在中国延安、太行山从事抗日斗争的朝鲜共产党人进行清洗，还是官方宣传和教科书中向来极少提及朝鲜战争时的中国志愿军，都是在“树立主体，反对事大”，消除民间的中国崇拜，不断强调朝鲜民族的主体性，宣扬民族主义，这对于封闭的、强敌环饲的朝鲜来说，很容易培养起强大的群众基础。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">中朝关系历来也不是由双边关系来界定的。古代两国关系受制于日本，明朝万历年间的壬辰倭乱、清末的甲午战争，都因日本入侵朝鲜，中国出于保护藩属国的道义，出兵抗日，结果直接加速了两个王朝的灭亡；朝鲜战争中国出兵，是为对抗美国。冷战时期，中朝因为意识形态纽带，形成一种同志加兄弟的友谊，但当这种关系赖以为继的外部环境发生变化之后，就会变质。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">从70年代中美、中日关系正常化以及中国的改革开放开始，中国就从革命外交的思维中走出来，开始了以国家利益为核心的外交时代，融入到美国主导的国际经济体系之中去，这也是中国在40年来取得非凡成就的根本所在。而朝鲜则仍然致力于构建“主体思想”，反对“事大主义”，基于意识形态为纽带的亲密关系逐渐松弛了，现实利益让两国处于两个平行线上。1992年中韩建交，更引发了朝鲜对中国不满。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">朝鲜深知自己对中国的战略意义，也只有在需要帮助的时候才会想起中国。钱其琛在他的《外交十记》当中，回忆了他亲自去向金日成报告中韩建交的事情，当时钱其琛一行的专机到达平壤之后，机场没有按照惯例举行欢迎仪式，钱其琛一行改乘朝鲜准备的直升机，飞到金日成夏季常住的湖滨别墅。钱其琛向金日成转达了江泽民的口信。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">金日成当时说，中国的事情，中国定了就可以了，你们就按你们定的做，我们自己走自己的路。需要的时候，我们再请你们帮助吧，就这样吧。在钱其琛的记忆当中，这次会见是金日成历次会见中国代表团时间最短的一次。会见之后，没有举行任何例行的招待宴会，钱其琛一行当天就返回了北京。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">如今，包括美日韩在内，很多人将朝鲜日益壮大的核力量归罪于中国，认为中国没有对其施加影响力，这其实是没有认清中朝之间真实的关系。中方已经多次声明，中国和朝鲜是正常的国家关系，正常关系就是说，我跟他不存在军事同盟，也不会干涉他的内政。而且，历次核试后联合国对朝鲜的制裁决议，中国都是了投赞成票的，难道这还不够明显吗？</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: none; outline: 0px; font-weight: 700; font-style: inherit; vertical-align: baseline; background: transparent; list-style: none;\">还有一些人说，当年中国试验原子弹，美国苏联也坚决反对，如今朝鲜是一个主权国家，为啥你能有原子弹，人家就不能有？这个逻辑忽视了一个国际道义的问题，核武器是一种终极武器，跟炮弹不一样，需要极强的控制能力，还得有大国担当，否则对全人类都是毁灭性的。曾有外国专家去朝鲜考察核设施，对他们的防护设施感到很担忧，虽然他坚决反对朝鲜搞核武器，但还是从人道主义出发，为他们提供了改进设备的技术手段。</span></p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">这就朝鲜核设施的现实情况，这些核设施距离中国边境不过百十公里，一旦发生泄漏，大片东北国土势必遭殃，全世界没有哪个国家在人口这么稠密的地方进行核试验。加上朝鲜的体制和领导人的行事风格，谁能保障他不乱来？万一玩火自焚，大量朝鲜人变成难民涌入中国怎么办？</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">如今中国的地位很尴尬，打，不可能，一言不合就动手的时代已经过去了，中国也绝不会允许有人在自己家门口放火，朝鲜又把2000多万人民和核武器一起绑在战车上，到时候跟你来个鱼死网破，大家就都吃不了兜着了；和，也很难，六方会谈基本破产，重新启动遥遥无期，美国要求朝鲜首先放弃核武器再谈判，朝鲜则要求美国先承认它的核地位再说，互相极度不信任，根本坐不下来。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">有人提出由中国提供核保护伞来换取朝鲜弃核，且不说这与中国一贯的不结盟政策相违背，朝鲜压根就没打算靠别人的保护伞，否则金氏的合法性在哪里？靠着核保护伞能统一国家吗？</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">因为主体思想，朝鲜不会允许任何大国插手本国事务，对自己施加影响，大国也很难像对叙利亚、伊拉克、利比亚那样，在内部扶植自己的力量。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">朝鲜领袖就是在这样的地缘格局中生存了下来，比萨达姆、卡扎菲甚至巴沙尔活得都好。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">如果把国际社会比作丛林，朝鲜就是眼镜蛇，它全身柔软，但有两颗令人胆颤毒牙，从民族国家进化的角度来看，朝鲜是成功的，不管是试射导弹还是核试验，他都是在把这两颗毒牙磨得更加锋利而已，这比上面那些穆斯林国家坐以待毙要高明。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: &quot;Microsoft YaHei&quot;, 微软雅黑, Arial, &quot;Open Sans&quot;, SimSun, sans-serif; list-style: none; text-indent: 2em; line-height: 25.2px; color: rgb(99, 107, 111); font-size: 14px; white-space: normal;\">（来源：微信公众号“财经也疯狂”）</p><p><br/></p>', '2020-05-07 08:52:50', '文章二', 0, 6, 1, 1, 1, 0, NULL);
INSERT INTO `qw_article` VALUES (21, '文章五', '文章五', '文章五', 'uploads/2020-05-07/XrQcgHH0AaB7oEJ5GOfVhaQ3bfkLMNj4WMTrjp25.jpeg', '<p>文章五</p>', '2020-05-07 10:24:29', '文章五', 0, 6, 2, 1, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (14, '文章一', '文章一', '文章一', 'uploads/2020-05-07/wIz1lA8MIsVdKgdh1CEVQVKw5AEeHaP14trqqEYw.jpeg', '<p>文章一文章一文章一</p>', '2020-05-07 08:52:24', '文章一', 0, 8, 2, 1, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (18, '文章二', '文章二', '文章二', 'uploads/2020-05-07/oovGAe1PoyCJFenR6CL7RZfjMiufpYfeQV3MV6AC.jpeg', '<p>文章二</p>', '2020-05-07 09:16:34', '文章二', 0, 8, 1, 1, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (19, '文章四', '文章四', '文章四', 'uploads/2020-05-07/wFz3BK7Hvo2YlMhvW5rok971rHjY5A5NUlCpADG3.jpeg', '<p>文章四</p>', '2020-05-07 09:17:22', '文章四', 0, 6, 2, 1, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (20, '文章三', '文章三', '文章三', 'uploads/2020-05-07/DmFetiFAhcy7P4jqul74Lz3RAL30en1aoMkMlNMK.jpeg', '<p>文章三</p>', '2020-05-07 10:02:26', '文章三', 0, 8, 2, 1, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (22, '文章六', '文章六', '文章六', 'uploads/2020-05-07/BCDlVY8xkJ0iOG96YK44eimciJBbLcKMoj1CYxJJ.jpeg', '<p>文章六</p>', '2020-05-07 10:38:36', '文章六', 0, 6, 2, 1, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (23, '文章一', '文章一', '文章一', 'uploads/2020-05-07/b0Rpb102xiK5SXLOGkTaNApnAa5rO8fINMo5JImF.jpeg', '<p>文章一</p>', '2020-05-07 11:16:50', '文章一', 0, 9, 1, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (24, '文章一', '文章一', '文章一', 'uploads/2020-05-07/2kn8OgXBlxqJj0SYeQueHZ2fkEO8l6VDj2VnwrHj.jpeg', '<p>文章一</p>', '2020-05-07 11:17:21', '文章一', 0, 15, 1, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (25, '测试1', '测试1', '测试1测试1测试1测试1测试1测试1测试1测试1测试1测试1', 'uploads/2020-05-19/qArYC5K8IgHGuqjEaPmrEJtExkYUan5IMaHSSA7T.jpeg', '<p>测试1测试1测试1测试1</p>', '2020-05-19 10:57:14', '测试1', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (26, '测试2', '测试2', '测试2测试2测试2测试2', 'uploads/2020-05-19/Qx1OpfyDelldjlavDAkPr6kKaC2fkbXZUrb7XSGW.jpeg', '<p>测试2测试2测试2测试2测试2</p>', '2020-05-19 10:57:36', '测试2', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (27, '测试3', '测试3', '测试3', 'uploads/2020-05-19/Olz564veWu3ASFJgCZIYBY67oU0cC1VqFXu5edlg.jpeg', '<p>测试3测试3测试3测试3</p>', '2020-05-19 10:58:03', '测试3', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (28, '测试4', '测试4', '测试4测试4', 'uploads/2020-05-19/jGGBZXRniZCygWJk9lomu98nnofLnfKVVfTnzFgh.jpeg', '<p>测试4测试4测试4</p>', '2020-05-19 11:14:34', '测试4', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (29, '测试5', '测试5', '测试5', 'uploads/2020-05-19/8LortPXbJXGU7XFeSEEiimLeA1F9JCAbdedKKLpe.jpeg', '<p>测试5</p>', '2020-05-19 11:18:34', '测试5', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (30, '测试6', '测试6', '测试6', 'uploads/2020-05-19/vVh33lVcRJypha0GEsx0mhAtgcGJKlqX6MRrk9Ai.jpeg', '<p>测试6</p>', '2020-05-19 11:18:53', '测试6', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (31, '测试7', '测试7', '测试7', 'uploads/2020-05-19/TJVOKkcAk63T4nnqx9aORrJpFBmE13SikU6BDzW3.jpeg', '<p>测试7</p>', '2020-05-19 11:19:10', '测试7', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (32, '测试8', '测试8', '测试8', 'uploads/2020-05-19/9pCm92uYLOLK1eGWBMGrSoBpbb3tlRMsrL7cTZCq.jpeg', '<p>测试8</p>', '2020-05-19 11:19:25', '测试8', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (33, '测试9', '测试9', '测试9', 'uploads/2020-05-19/VC2JccFOUM803yJzf5ARFhKmNvcUEkearezHOkPx.jpeg', '<p>测试9测试9</p>', '2020-05-19 11:19:41', '测试9', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (34, '测试10', '测试10', '测试10测试10', 'uploads/2020-05-19/kqu3GSL80M3oUfwlZnbrYk5Ho3oxQa4iIXurOgyL.jpeg', '<p>测试10测试10</p>', '2020-05-19 11:20:01', '测试10', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (35, '测试11', '测试11', '测试11', 'uploads/2020-05-19/amr2iDDi7C9QJs45bMKLR3nqtX3q0KkoMlzrevHS.jpeg', '<p>测试11</p>', '2020-05-19 11:20:16', '测试11', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (36, '测试12', '测试12', '测试12', 'uploads/2020-05-19/YMdxUGRYChaIIBAa2gRtmOaUW56zKL8gZ3HoQfwO.jpeg', '<p>测试12</p>', '2020-05-19 11:21:06', '测试12', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (37, '测试13', '测试13', '测试13', 'uploads/2020-05-19/8dQopiZ9l4MCrSEs66JSjI2gnVzSWIYeJS6DCLTf.jpeg', '<p>测试13测试13</p>', '2020-05-19 11:21:41', '测试13', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (38, '测试14', '测试14', '测试14', 'uploads/2020-05-19/6nZWtWRWjrujWexb7VqyXHddCPNElpnkA7rLWHqD.jpeg', '<p>测试14</p>', '2020-05-19 11:21:55', '测试14', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (51, '是东风风光', '是东风风光', '是东风风光', NULL, '<p>是东风风光</p>', '2020-07-08 14:36:57', '是东风风光', 0, 6, 2, 0, 0, 0, 'uploads/2020-07-08/UCjzNRQbwsl9Ezg6jDkjtxAujxN3q1ZBsbl1Yxdt.jpeg,uploads/2020-07-08/98efo3JCDhPHMTRwLeDLgzfoDQ0qChMfvre1iuTd.jpeg,uploads/2020-07-08/vmJHnRugy9Qh1lhs0bRykBWgTs3XC9vZYBlCtrii.jpeg');

-- ----------------------------
-- Table structure for qw_category
-- ----------------------------
DROP TABLE IF EXISTS `qw_category`;
CREATE TABLE `qw_category`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '分类名称',
  `cate_title` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '分类别名',
  `cate_order` int(11) DEFAULT NULL COMMENT '排序',
  `cate_pid` int(11) DEFAULT NULL COMMENT '父ID',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '文章分类表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qw_category
-- ----------------------------
INSERT INTO `qw_category` VALUES (3, '深阅读', '深阅读', 1, 0);
INSERT INTO `qw_category` VALUES (4, '浅阅读', '浅阅读', 2, 0);
INSERT INTO `qw_category` VALUES (17, '強文连载', '強文连载', 3, 0);
INSERT INTO `qw_category` VALUES (6, '七嘴八舌', '七嘴八舌', 1, 3);
INSERT INTO `qw_category` VALUES (8, '心灵花园', '心灵花园', 2, 3);
INSERT INTO `qw_category` VALUES (9, '读书书语', '读书书语', 4, 3);
INSERT INTO `qw_category` VALUES (10, '史海拾贝', '史海拾贝', 3, 3);
INSERT INTO `qw_category` VALUES (11, '新视野', '新视野', 1, 4);
INSERT INTO `qw_category` VALUES (13, '浮世绘', '浮世绘', 2, 4);
INSERT INTO `qw_category` VALUES (15, '鲜活科学', '鲜活科学', 5, 3);
INSERT INTO `qw_category` VALUES (18, '光影赏析', '光影赏析', 6, 3);
INSERT INTO `qw_category` VALUES (19, '有料', '有料', 4, 0);
INSERT INTO `qw_category` VALUES (20, '能量加油站', '能量加油站', 1, 19);
INSERT INTO `qw_category` VALUES (21, '冷笑话精选', '冷笑话精选', 2, 19);

-- ----------------------------
-- Table structure for qw_clent_ip
-- ----------------------------
DROP TABLE IF EXISTS `qw_clent_ip`;
CREATE TABLE `qw_clent_ip`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `art_id` int(11) DEFAULT NULL COMMENT '文章ID',
  `ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'ip',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '文章点赞记录表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for qw_collect
-- ----------------------------
DROP TABLE IF EXISTS `qw_collect`;
CREATE TABLE `qw_collect`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `art_id` int(11) DEFAULT NULL COMMENT '文章ID',
  `u_id` int(11) DEFAULT NULL COMMENT '收藏人ID',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '文章收藏表' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of qw_collect
-- ----------------------------
INSERT INTO `qw_collect` VALUES (4, 15, 1);

-- ----------------------------
-- Table structure for qw_comment
-- ----------------------------
DROP TABLE IF EXISTS `qw_comment`;
CREATE TABLE `qw_comment`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL COMMENT '评论人ID',
  `u_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '评论人用户名',
  `u_thumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '评论人头像',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '内容',
  `art_id` int(11) DEFAULT NULL COMMENT '文章ID',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '文章评论表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for qw_config
-- ----------------------------
DROP TABLE IF EXISTS `qw_config`;
CREATE TABLE `qw_config`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conf_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '标题',
  `conf_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '变量名',
  `conf_content` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '变量值',
  `conf_tips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '描述',
  `fiele_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '字段类型',
  `fiele_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '类型值',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '网站配置表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qw_config
-- ----------------------------
INSERT INTO `qw_config` VALUES (1, '网站标题', 'web_title', 'QW后台模板1', NULL, 'input', NULL);
INSERT INTO `qw_config` VALUES (2, '网站网址', 'web_url', 'http://www.boke.com/admin', NULL, 'input', NULL);
INSERT INTO `qw_config` VALUES (3, '备案', 'ICP', '备案备案备案备案备案备案备案', NULL, 'textarea', NULL);
INSERT INTO `qw_config` VALUES (4, '网站状态', 'web_status', '1', NULL, 'radio', '1|开启,0|关闭');

-- ----------------------------
-- Table structure for qw_homeuser
-- ----------------------------
DROP TABLE IF EXISTS `qw_homeuser`;
CREATE TABLE `qw_homeuser`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '用户名',
  `user_pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '密码',
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '手机号',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '邮箱',
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '验证用户有效性标识',
  `active` tinyint(2) DEFAULT 0 COMMENT '1激活0未激活',
  `thumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '头像',
  `guoqi` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '过期时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '前端用户表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qw_homeuser
-- ----------------------------
INSERT INTO `qw_homeuser` VALUES (9, NULL, 'e10adc3949ba59abbe56e057f20f883e', '13124273579', NULL, NULL, 0, NULL, NULL);
INSERT INTO `qw_homeuser` VALUES (8, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, 'qiuweihappy@vip.qq.com', 'bb5e9cfed0efeda790b79464637bc303', 1, NULL, '1589513470');

-- ----------------------------
-- Table structure for qw_links
-- ----------------------------
DROP TABLE IF EXISTS `qw_links`;
CREATE TABLE `qw_links`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '友情链接名',
  `link_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '连接标题',
  `link_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '链接URL',
  `link_order` int(11) DEFAULT NULL COMMENT '排序',
  `created_at` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '添加时间',
  `updated_at` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '修改时间',
  `delete_at` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '友情链接表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for qw_permission
-- ----------------------------
DROP TABLE IF EXISTS `qw_permission`;
CREATE TABLE `qw_permission`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL COMMENT '父集ID',
  `per_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '权限名称',
  `pre_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '权限对应的路由',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 76 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '权限表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qw_permission
-- ----------------------------
INSERT INTO `qw_permission` VALUES (1, 0, '用户管理', NULL);
INSERT INTO `qw_permission` VALUES (2, 4, '角色列表', 'App\\Http\\Controllers\\Admin\\RoleController@index');
INSERT INTO `qw_permission` VALUES (3, 1, '用户列表', 'App\\Http\\Controllers\\Admin\\UserController@index');
INSERT INTO `qw_permission` VALUES (4, 0, '角色管理', NULL);
INSERT INTO `qw_permission` VALUES (5, 4, '添加角色', 'App\\Http\\Controllers\\Admin\\RoleController@create');
INSERT INTO `qw_permission` VALUES (10, 4, '删除角色上传', 'App\\Http\\Controllers\\Admin\\RoleController@destroy');
INSERT INTO `qw_permission` VALUES (14, 1, '添加用户', 'App\\Http\\Controllers\\Admin\\UserController@create');
INSERT INTO `qw_permission` VALUES (16, 1, '删除用户上传', 'App\\Http\\Controllers\\Admin\\UserController@destroy');
INSERT INTO `qw_permission` VALUES (17, 1, '编辑用户', 'App\\Http\\Controllers\\Admin\\UserController@edit');
INSERT INTO `qw_permission` VALUES (18, 1, '用户授权', 'App\\Http\\Controllers\\Admin\\UserController@auth');
INSERT INTO `qw_permission` VALUES (19, 4, '编辑角色', 'App\\Http\\Controllers\\Admin\\RoleController@edit');
INSERT INTO `qw_permission` VALUES (20, 4, '角色授权', 'App\\Http\\Controllers\\Admin\\RoleController@auth');
INSERT INTO `qw_permission` VALUES (21, 0, '权限管理', NULL);
INSERT INTO `qw_permission` VALUES (22, 21, '权限列表', 'App\\Http\\Controllers\\Admin\\PermissionController@index');
INSERT INTO `qw_permission` VALUES (23, 21, '添加权限', 'App\\Http\\Controllers\\Admin\\PermissionController@create');
INSERT INTO `qw_permission` VALUES (24, 21, '编辑权限', 'App\\Http\\Controllers\\Admin\\PermissionController@edit');
INSERT INTO `qw_permission` VALUES (25, 21, '删除权限上传', 'App\\Http\\Controllers\\Admin\\PermissionController@destroy');
INSERT INTO `qw_permission` VALUES (32, 0, '首页', 'App\\Http\\Controllers\\Admin\\IndexController@index');
INSERT INTO `qw_permission` VALUES (33, 32, '欢迎页', 'App\\Http\\Controllers\\Admin\\IndexController@welcome');
INSERT INTO `qw_permission` VALUES (34, 1, '用户添加上传', 'App\\Http\\Controllers\\Admin\\UserController@store');
INSERT INTO `qw_permission` VALUES (35, 1, '用户编辑上传', 'App\\Http\\Controllers\\Admin\\UserController@update');
INSERT INTO `qw_permission` VALUES (37, 1, '用户批量删除上传', 'App\\Http\\Controllers\\Admin\\UserController@delall');
INSERT INTO `qw_permission` VALUES (38, 1, '用户授权上传', 'App\\Http\\Controllers\\Admin\\UserController@doauth');
INSERT INTO `qw_permission` VALUES (39, 4, '角色添加上传', 'App\\Http\\Controllers\\Admin\\RoleController@store');
INSERT INTO `qw_permission` VALUES (40, 4, '角色编辑上传', 'App\\Http\\Controllers\\Admin\\RoleController@update');
INSERT INTO `qw_permission` VALUES (41, 4, '角色授权上传', 'App\\Http\\Controllers\\Admin\\RoleController@doauth');
INSERT INTO `qw_permission` VALUES (42, 4, '角色批量删除上传', 'App\\Http\\Controllers\\Admin\\RoleController@delall');
INSERT INTO `qw_permission` VALUES (43, 21, '权限添加上传', 'App\\Http\\Controllers\\Admin\\PermissionController@store');
INSERT INTO `qw_permission` VALUES (44, 21, '权限编辑上传', 'App\\Http\\Controllers\\Admin\\PermissionController@update');
INSERT INTO `qw_permission` VALUES (45, 21, '权限批量删除上传', 'App\\Http\\Controllers\\Admin\\PermissionController@delall');
INSERT INTO `qw_permission` VALUES (46, 0, '分类管理', NULL);
INSERT INTO `qw_permission` VALUES (47, 46, '添加分类', 'App\\Http\\Controllers\\Admin\\CategoryController@create');
INSERT INTO `qw_permission` VALUES (48, 46, '编辑分类', 'App\\Http\\Controllers\\Admin\\CategoryController@edit');
INSERT INTO `qw_permission` VALUES (49, 46, '分类列表', 'App\\Http\\Controllers\\Admin\\CategoryController@index');
INSERT INTO `qw_permission` VALUES (50, 46, '删除分类上传', 'App\\Http\\Controllers\\Admin\\CategoryController@destroy');
INSERT INTO `qw_permission` VALUES (51, 46, '批量删除分类上传', 'App\\Http\\Controllers\\Admin\\CategoryController@delall');
INSERT INTO `qw_permission` VALUES (52, 46, '添加分类上传', 'App\\Http\\Controllers\\Admin\\CategoryController@store');
INSERT INTO `qw_permission` VALUES (53, 46, '编辑分类上传', 'App\\Http\\Controllers\\Admin\\CategoryController@update');
INSERT INTO `qw_permission` VALUES (54, 46, '分类排序上传', 'App\\Http\\Controllers\\Admin\\CategoryController@paixu');
INSERT INTO `qw_permission` VALUES (55, 0, '文章管理', NULL);
INSERT INTO `qw_permission` VALUES (56, 55, '添加文章', 'App\\Http\\Controllers\\Admin\\ArticleController@create');
INSERT INTO `qw_permission` VALUES (57, 55, '文章列表', 'App\\Http\\Controllers\\Admin\\ArticleController@index');
INSERT INTO `qw_permission` VALUES (58, 55, '添加文章上传', 'App\\Http\\Controllers\\Admin\\ArticleController@store');
INSERT INTO `qw_permission` VALUES (59, 55, '文章编辑', 'App\\Http\\Controllers\\Admin\\ArticleController@edit');
INSERT INTO `qw_permission` VALUES (60, 55, '文章编辑上传', 'App\\Http\\Controllers\\Admin\\ArticleController@update');
INSERT INTO `qw_permission` VALUES (61, 55, '文章删除上传', 'App\\Http\\Controllers\\Admin\\ArticleController@destroy');
INSERT INTO `qw_permission` VALUES (62, 55, '文章批量删除上传', 'App\\Http\\Controllers\\Admin\\ArticleController@delall');
INSERT INTO `qw_permission` VALUES (63, 55, '文件上传', 'App\\Http\\Controllers\\Admin\\ArticleController@upload');
INSERT INTO `qw_permission` VALUES (64, 0, '网站配置', NULL);
INSERT INTO `qw_permission` VALUES (65, 64, '网站配置列表', 'App\\Http\\Controllers\\Admin\\ConfigController@index');
INSERT INTO `qw_permission` VALUES (66, 64, '网站配置添加', 'App\\Http\\Controllers\\Admin\\ConfigController@create');
INSERT INTO `qw_permission` VALUES (67, 64, '网站配置添加上传', 'App\\Http\\Controllers\\Admin\\ConfigController@store');
INSERT INTO `qw_permission` VALUES (68, 64, '网站配置修改', 'App\\Http\\Controllers\\Admin\\ConfigController@edit');
INSERT INTO `qw_permission` VALUES (69, 64, '网站配置修改上传', 'App\\Http\\Controllers\\Admin\\ConfigController@update');
INSERT INTO `qw_permission` VALUES (70, 64, '网站配置删除上传', 'App\\Http\\Controllers\\Admin\\ConfigController@destroy');
INSERT INTO `qw_permission` VALUES (71, 64, '网站配置批量修改上传', 'App\\Http\\Controllers\\Admin\\ConfigController@editall');
INSERT INTO `qw_permission` VALUES (72, 64, '网站配置写入文件上传', 'App\\Http\\Controllers\\Admin\\ConfigController@xieru');
INSERT INTO `qw_permission` VALUES (73, 55, '多图片上传', 'App\\Http\\Controllers\\Admin\\ArticleController@uploadduo');
INSERT INTO `qw_permission` VALUES (74, 55, '前端删除图片', 'App\\Http\\Controllers\\Admin\\ArticleController@duotushan');
INSERT INTO `qw_permission` VALUES (75, 55, '前端重选删除图片', 'App\\Http\\Controllers\\Admin\\ArticleController@duotushanc');

-- ----------------------------
-- Table structure for qw_role
-- ----------------------------
DROP TABLE IF EXISTS `qw_role`;
CREATE TABLE `qw_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '角色名称',
  `describe` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '角色描述',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = ' 角色表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qw_role
-- ----------------------------
INSERT INTO `qw_role` VALUES (1, '超级管理员', '超级管理员');
INSERT INTO `qw_role` VALUES (2, '项目经理', '角色二角色二角色二角色二角色二角色二');
INSERT INTO `qw_role` VALUES (3, '角色三', '角色三角色三角色三角色三角色三角色三');
INSERT INTO `qw_role` VALUES (4, '角色四', '角色四角色四角色四角色四角色四');
INSERT INTO `qw_role` VALUES (5, '角色五', '角色五角色五角色五角色五角色五角色五');
INSERT INTO `qw_role` VALUES (6, '角色六', '角色六角色六角色六角色六角色六');
INSERT INTO `qw_role` VALUES (7, '角色七', '角色七角色七角色七角色七角色七');
INSERT INTO `qw_role` VALUES (8, '角色八', '角色八角色八角色八角色八');
INSERT INTO `qw_role` VALUES (13, '角色九', '角色九角色九角色九角色九角色九');

-- ----------------------------
-- Table structure for qw_role_permission
-- ----------------------------
DROP TABLE IF EXISTS `qw_role_permission`;
CREATE TABLE `qw_role_permission`  (
  `role_id` int(11) NOT NULL COMMENT '角色表ID',
  `permission_id` int(11) DEFAULT NULL COMMENT '权限id'
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '角色权限关联表' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of qw_role_permission
-- ----------------------------
INSERT INTO `qw_role_permission` VALUES (1, 34);
INSERT INTO `qw_role_permission` VALUES (1, 33);
INSERT INTO `qw_role_permission` VALUES (1, 25);
INSERT INTO `qw_role_permission` VALUES (1, 24);
INSERT INTO `qw_role_permission` VALUES (1, 69);
INSERT INTO `qw_role_permission` VALUES (1, 23);
INSERT INTO `qw_role_permission` VALUES (12, 5);
INSERT INTO `qw_role_permission` VALUES (1, 22);
INSERT INTO `qw_role_permission` VALUES (12, 3);
INSERT INTO `qw_role_permission` VALUES (1, 32);
INSERT INTO `qw_role_permission` VALUES (1, 21);
INSERT INTO `qw_role_permission` VALUES (1, 20);
INSERT INTO `qw_role_permission` VALUES (1, 19);
INSERT INTO `qw_role_permission` VALUES (1, 10);
INSERT INTO `qw_role_permission` VALUES (1, 5);
INSERT INTO `qw_role_permission` VALUES (1, 2);
INSERT INTO `qw_role_permission` VALUES (1, 4);
INSERT INTO `qw_role_permission` VALUES (1, 18);
INSERT INTO `qw_role_permission` VALUES (1, 17);
INSERT INTO `qw_role_permission` VALUES (8, 5);
INSERT INTO `qw_role_permission` VALUES (8, 4);
INSERT INTO `qw_role_permission` VALUES (8, 1);
INSERT INTO `qw_role_permission` VALUES (1, 16);
INSERT INTO `qw_role_permission` VALUES (1, 14);
INSERT INTO `qw_role_permission` VALUES (1, 3);
INSERT INTO `qw_role_permission` VALUES (1, 1);
INSERT INTO `qw_role_permission` VALUES (1, 68);
INSERT INTO `qw_role_permission` VALUES (1, 67);
INSERT INTO `qw_role_permission` VALUES (1, 66);
INSERT INTO `qw_role_permission` VALUES (1, 65);
INSERT INTO `qw_role_permission` VALUES (1, 64);
INSERT INTO `qw_role_permission` VALUES (1, 63);
INSERT INTO `qw_role_permission` VALUES (1, 62);
INSERT INTO `qw_role_permission` VALUES (1, 61);
INSERT INTO `qw_role_permission` VALUES (1, 60);
INSERT INTO `qw_role_permission` VALUES (1, 59);
INSERT INTO `qw_role_permission` VALUES (1, 58);
INSERT INTO `qw_role_permission` VALUES (1, 57);
INSERT INTO `qw_role_permission` VALUES (1, 56);
INSERT INTO `qw_role_permission` VALUES (1, 55);
INSERT INTO `qw_role_permission` VALUES (2, 33);
INSERT INTO `qw_role_permission` VALUES (2, 32);
INSERT INTO `qw_role_permission` VALUES (1, 35);
INSERT INTO `qw_role_permission` VALUES (1, 37);
INSERT INTO `qw_role_permission` VALUES (1, 38);
INSERT INTO `qw_role_permission` VALUES (1, 39);
INSERT INTO `qw_role_permission` VALUES (1, 40);
INSERT INTO `qw_role_permission` VALUES (1, 41);
INSERT INTO `qw_role_permission` VALUES (1, 42);
INSERT INTO `qw_role_permission` VALUES (1, 43);
INSERT INTO `qw_role_permission` VALUES (1, 44);
INSERT INTO `qw_role_permission` VALUES (1, 45);
INSERT INTO `qw_role_permission` VALUES (1, 46);
INSERT INTO `qw_role_permission` VALUES (1, 47);
INSERT INTO `qw_role_permission` VALUES (1, 48);
INSERT INTO `qw_role_permission` VALUES (1, 49);
INSERT INTO `qw_role_permission` VALUES (1, 50);
INSERT INTO `qw_role_permission` VALUES (1, 51);
INSERT INTO `qw_role_permission` VALUES (1, 52);
INSERT INTO `qw_role_permission` VALUES (1, 53);
INSERT INTO `qw_role_permission` VALUES (1, 54);
INSERT INTO `qw_role_permission` VALUES (3, 1);
INSERT INTO `qw_role_permission` VALUES (3, 3);
INSERT INTO `qw_role_permission` VALUES (3, 14);
INSERT INTO `qw_role_permission` VALUES (3, 16);
INSERT INTO `qw_role_permission` VALUES (3, 17);
INSERT INTO `qw_role_permission` VALUES (3, 18);
INSERT INTO `qw_role_permission` VALUES (3, 34);
INSERT INTO `qw_role_permission` VALUES (3, 35);
INSERT INTO `qw_role_permission` VALUES (3, 37);
INSERT INTO `qw_role_permission` VALUES (3, 38);
INSERT INTO `qw_role_permission` VALUES (3, 4);
INSERT INTO `qw_role_permission` VALUES (3, 2);
INSERT INTO `qw_role_permission` VALUES (3, 5);
INSERT INTO `qw_role_permission` VALUES (3, 10);
INSERT INTO `qw_role_permission` VALUES (3, 19);
INSERT INTO `qw_role_permission` VALUES (3, 20);
INSERT INTO `qw_role_permission` VALUES (3, 39);
INSERT INTO `qw_role_permission` VALUES (3, 40);
INSERT INTO `qw_role_permission` VALUES (3, 41);
INSERT INTO `qw_role_permission` VALUES (3, 42);
INSERT INTO `qw_role_permission` VALUES (6, 21);
INSERT INTO `qw_role_permission` VALUES (6, 22);
INSERT INTO `qw_role_permission` VALUES (6, 23);
INSERT INTO `qw_role_permission` VALUES (6, 24);
INSERT INTO `qw_role_permission` VALUES (6, 25);
INSERT INTO `qw_role_permission` VALUES (6, 43);
INSERT INTO `qw_role_permission` VALUES (6, 44);
INSERT INTO `qw_role_permission` VALUES (6, 45);
INSERT INTO `qw_role_permission` VALUES (1, 70);
INSERT INTO `qw_role_permission` VALUES (1, 71);
INSERT INTO `qw_role_permission` VALUES (1, 72);
INSERT INTO `qw_role_permission` VALUES (1, 73);
INSERT INTO `qw_role_permission` VALUES (1, 74);
INSERT INTO `qw_role_permission` VALUES (1, 75);

-- ----------------------------
-- Table structure for qw_user
-- ----------------------------
DROP TABLE IF EXISTS `qw_user`;
CREATE TABLE `qw_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户名',
  `user_pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '后台用户表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qw_user
-- ----------------------------
INSERT INTO `qw_user` VALUES (1, 'admin', 'eyJpdiI6InN3bWtsSUtCWWFLUndXREthN1dHUkE9PSIsInZhbHVlIjoiR2pvdG1aMXpLK3JTTjFQUXVDQm54Zz09IiwibWFjIjoiOTUwZmE1MmQ5NGJhNzFhOGYxYjk1OGQ2NTZmODJjMmRkNzkzZTVmYWQ3NWZkZDk4NmU5YmE4ZWI4NjViNmY2NCJ9\r\n');
INSERT INTO `qw_user` VALUES (2, 'qiuwei', 'eyJpdiI6ImZsb2NQMTJ1R1IxUWl3RmlDRm9uXC93PT0iLCJ2YWx1ZSI6IjJBTkpwQVwvelI0QzFvcjY4OGZOa0RRPT0iLCJtYWMiOiJiNzNhMTY0YTNkYjM0ODc1ZjJhY2I2OTZjODNjNmI5YWVhOTM2MmQ1YmM5YTdjN2U2MGM2ODRlZDZiOTA0YTJmIn0=');
INSERT INTO `qw_user` VALUES (3, 'aaaaaa', 'eyJpdiI6IlRFSlRqZElYMlh0N1h2Z2ZFWGNlQ2c9PSIsInZhbHVlIjoicldaOUxmU1dhTUFJaHFNbGlub2l2UT09IiwibWFjIjoiOTZkOGYyMzYyMzM4OGJjNmFiNmQ2NmM3MGExMTUxNzBlYTE4Y2IzNWM0YzJiMjAzOGY5Nzk0Njg1NjhmMGE0MCJ9');
INSERT INTO `qw_user` VALUES (4, 'bbbbbb', 'eyJpdiI6Ik1HVDl1c3BXTW9GZERJXC9peGFidGVBPT0iLCJ2YWx1ZSI6IjY1SEZ5eVVReEZQZ2xDZ1FOMGllOUE9PSIsIm1hYyI6ImU1ODg0M2Q1MDllZmJjNTkzMjRlMjZmY2YxNmFlNDRjNWM2MDU2MDdjMmM1OTM0ZDVkNzUwZGE4Y2NlMDJmMDYifQ==');
INSERT INTO `qw_user` VALUES (5, 'cccccc', 'eyJpdiI6Ik9FSHJlOE1pODM4NWtcL0tQY2NYXC9hZz09IiwidmFsdWUiOiJCZ29hRnl4WWp2dWpTSVFVRDVlaXNRPT0iLCJtYWMiOiJmZjcxYjI5MzZmZjQ3ZjdlMzQ0NzllY2I5OGJkN2YyZDg4YWMyODE3OWJhOGQwMDJkZmJmNzY3NzQ2MTE3YzdkIn0=');
INSERT INTO `qw_user` VALUES (6, 'dddddd', 'eyJpdiI6IkpqQWdhNVVNbEh5bCs1R2NoT1pza0E9PSIsInZhbHVlIjoiWjRYR0hiTW9aSVZvaGdBS2VhVDBVZz09IiwibWFjIjoiZGQ1MDNmNTljM2YzMmYwZTMzZDA5YjdmZjVlY2VhYjQ2OTE3NzcyMWYyOTUyMzdhNzkwMTgyOGNiZjU4OWQxMyJ9');
INSERT INTO `qw_user` VALUES (7, 'admin1', 'eyJpdiI6IkNCd1NkTUhRYmh2Skg4MWlDV1FuUHc9PSIsInZhbHVlIjoiTDBQak1GN2RNb2VmemZLdGx4b0VHdz09IiwibWFjIjoiMzcwMGUwZjNmYWFlZTM4YWQxYmM5N2E2ZjQ3MDFjZDQ1MzUwZmIzMDBmY2M0OTEyMjBkMTUxOWRkZTY5MzE2YSJ9');
INSERT INTO `qw_user` VALUES (13, 'qqqqqq', 'eyJpdiI6IlJ6dGxieUF3TFZzVW1wU0dGb1pyN3c9PSIsInZhbHVlIjoiMjFVSlZ3THlQc25kMTlrT0Q2NlR6QT09IiwibWFjIjoiODZhMDg2MDY4ZGUwZDA5OWZmN2ZkM2M3N2RhNjE3MjQ3ZjE1N2VhN2ZmMjBjYWVjMTVkODExMWZhYzVkOTNkNyJ9');
INSERT INTO `qw_user` VALUES (10, 'admin123', 'eyJpdiI6ImdzRk1aSFJQd3hWb2o2MmVHYmg2THc9PSIsInZhbHVlIjoiRTR4SHZkUTdvT1VVKzRZNThwbEFlUT09IiwibWFjIjoiM2FlMGZjZTZhMjBlOTUzMGVjYzIzNzU1NWZhOGU0YmY2MjMyMGE3Yjg5MzRiNGEzZmRlNWZhMzgxYjRiZGMwOSJ9');
INSERT INTO `qw_user` VALUES (14, 'wwwwww', 'eyJpdiI6InJxd3RpaTNkZmxBbW9YZ1FJTUtyU2c9PSIsInZhbHVlIjoiRCt6N29DTVlWQjZuMFZFUlFHYUh6dz09IiwibWFjIjoiMmQ4NmUxY2E4MmE4M2JhNDg5YzRmOTgyYmNhOGQ2MzY5MjFmMmM3MDQwZDJjYWNkMDg3ZTA2ZDU3YTYzNWEwNSJ9');

-- ----------------------------
-- Table structure for qw_user_role
-- ----------------------------
DROP TABLE IF EXISTS `qw_user_role`;
CREATE TABLE `qw_user_role`  (
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `role_id` int(11) DEFAULT NULL COMMENT '角色ID'
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户角色关联表' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of qw_user_role
-- ----------------------------
INSERT INTO `qw_user_role` VALUES (5, 6);
INSERT INTO `qw_user_role` VALUES (14, 3);
INSERT INTO `qw_user_role` VALUES (7, 5);
INSERT INTO `qw_user_role` VALUES (10, 5);
INSERT INTO `qw_user_role` VALUES (13, 6);
INSERT INTO `qw_user_role` VALUES (3, 4);
INSERT INTO `qw_user_role` VALUES (1, 1);
INSERT INTO `qw_user_role` VALUES (6, 5);
INSERT INTO `qw_user_role` VALUES (4, 3);
INSERT INTO `qw_user_role` VALUES (6, 4);
INSERT INTO `qw_user_role` VALUES (6, 3);
INSERT INTO `qw_user_role` VALUES (6, 2);
INSERT INTO `qw_user_role` VALUES (2, 2);

SET FOREIGN_KEY_CHECKS = 1;
