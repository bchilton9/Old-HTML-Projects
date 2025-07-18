<?php
/******************************
* EQdkp
* Copyright 2002-2003
* Licensed under the GNU GPL.  See COPYING for full terms.
* ------------------
* lang_main.php
* begin: Wed December 18 2002
*
* $Id: lang_main.php 33 2006-05-08 18:00:40Z tsigo $
*
* Chinese - Converted by zoof@263.net using http://pt.chinaeq.com
******************************/

if ( !defined('EQDKP_INC') )
{
     die('Do not access this file directly.');
}

// %1\$<type> prevents a possible error in strings caused
//      by another language re-ordering the variables
// $s is a string, $d is an integer, $f is a float

$lang['ENCODING'] = 'gb2312';
$lang['XML_LANG'] = 'cn';

// Titles
$lang['admin_title_prefix']   = "%1\$s %2\$s 管理员";
$lang['listadj_title']        = '团队调节列表';
$lang['listevents_title']     = '活动值';
$lang['listiadj_title']       = '个人调节列表';
$lang['listitems_title']      = '物品PT值';
$lang['listnews_title']       = '新闻条目';
$lang['listmembers_title']    = '标准会员';
$lang['listpurchased_title']  = '物品历�';
$lang['listraids_title']      = 'raids列表';
$lang['login_title']          = '登录';
$lang['message_title']        = 'EQdkp：信息';
$lang['register_title']       = '注册';
$lang['settings_title']       = '账号设置';
$lang['stats_title']          = "%1\$s 状态";
$lang['summary_title']        = '新闻摘要';
$lang['title_prefix']         = "%1\$s %2\$s";
$lang['viewevent_title']      = "查看raid历芳吐� for %1\$s";
$lang['viewitem_title']       = "查看交易历芳吐� for %1\$s";
$lang['viewmember_title']     = "历� for %1\$s";
$lang['viewraid_title']       = 'raid概要';

// Main Menu
$lang['menu_admin_panel'] = '管理面板';
$lang['menu_events'] = '活动';
$lang['menu_itemhist'] = '物品历�';
$lang['menu_itemval'] = '物品PT值';
$lang['menu_news'] = '新闻';
$lang['menu_raids'] = 'Raids';
$lang['menu_register'] = '注册';
$lang['menu_settings'] = '设置';
$lang['menu_standings'] = '基本信息';
$lang['menu_stats'] = '状态';
$lang['menu_summary'] = '摘要';

// Column Headers
$lang['account'] = '账户';
$lang['action'] = '动作';
$lang['active'] = '行为';
$lang['add'] = '添加';
$lang['added_by'] = '添加 By';
$lang['adjustment'] = '调节';
$lang['administration'] = '管理';
$lang['administrative_options'] = '管理设置';
$lang['admin_index'] = '管理员滓�';
$lang['attendance_by_event'] = '出席活动';
$lang['attended'] = '出席';
$lang['attendees'] = '出席者';
$lang['average'] = '平均';
$lang['backup_database'] = '备份菘�';
$lang['buyer'] = '买方';
$lang['buyers'] = '顾客们';
$lang['class'] = '职业';
$lang['class_distribution'] = '职业分布';
$lang['class_summary'] = "职业概要: %1\$s to %2\$s";
$lang['configuration'] = '设置';
$lang['current'] = '当前';
$lang['date'] = '日期';
$lang['delete'] = '删除';
$lang['delete_confirmation'] = '确认删除';
$lang['dkp_value'] = "%1\$s 值";
$lang['drops'] = '掉落';
$lang['earned'] = '杖�';
$lang['enter_dates'] = '进入日期';
$lang['eqdkp_index'] = 'EQdkp 滓�';
$lang['eqdkp_upgrade'] = 'EQdkp 更新';
$lang['event'] = '活动';
$lang['events'] = '活动';
$lang['filter'] = '过滤器';
$lang['first'] = '紫�';
$lang['rank'] = '头衔';
$lang['general_admin'] = '普通管理员';
$lang['get_new_password'] = '得到一个新密码';
$lang['group_adj'] = '团队调节';
$lang['group_adjustments'] = '团队调节';
$lang['individual_adjustments'] = '个人调节';
$lang['individual_adjustment_history'] = '个人调节纪录';
$lang['indiv_adj'] = '个人调节';
$lang['ip_address'] = 'IP地址';
$lang['item'] = '物品';
$lang['items'] = '物品';
$lang['item_purchase_history'] = '物品交易纪录';
$lang['last'] = '最后';
$lang['lastloot'] = '最后的loot';
$lang['lastraid'] = '最后的raid';
$lang['last_visit'] = '最后的访�';
$lang['level'] = '等级';
$lang['log_date_time'] = '纪录的日期/奔�';
$lang['loot_factor'] = 'Loot者';
$lang['loots'] = 'Loots';
$lang['manage'] = '处理';
$lang['member'] = '会员';
$lang['members'] = '会员们';
$lang['members_present_at'] = "当前会员 at %1\$s on %2\$s";
$lang['miscellaneous'] = '混杂';
$lang['name'] = '名字';
$lang['news'] = '消息';
$lang['note'] = '注�';
$lang['online'] = '在线';
$lang['options'] = '设置';
$lang['paste_log'] = '粘贴一个页底纪录';
$lang['percent'] = '当前的';
$lang['permissions'] = '许可';
$lang['per_day'] = '每天';
$lang['per_raid'] = '每次raid';
$lang['pct_earned_lost_to'] = '% 获得点鄯�';
$lang['preferences'] = '参�';
$lang['purchase_history_for'] = "交易历� for %1\$s";
$lang['quote'] = '引用';
$lang['race'] = '种族';
$lang['raid'] = 'Raid';
$lang['raids'] = 'Raids';
$lang['raid_id'] = 'Raid ID';
$lang['raid_attendance_history'] = 'raid出席纪录';
$lang['raids_lifetime'] = "有效奔� (%1\$s - %2\$s)";
$lang['raids_x_days'] = "持续 %1\$d 天";
$lang['rank_distribution'] = '头衔分配';
$lang['recorded_raid_history'] = "raid历芳吐� for %1\$s";
$lang['reason'] = '原因';
$lang['registration_information'] = '注册信息';
$lang['result'] = '结果';
$lang['session_id'] = 'Session ID';
$lang['settings'] = '设置';
$lang['spent'] = '花费';
$lang['summary_dates'] = "Raid 概要: %1\$s to %2\$s";
$lang['themes'] = '主题';
$lang['time'] = '奔�';
$lang['total'] = '总共';
$lang['total_earned'] = '杖牒霞�';
$lang['total_items'] = '物品总�';
$lang['total_raids'] = 'raid总�';
$lang['total_spent'] = '花费总�';
$lang['transfer_member_history'] = '会员历纷�';
$lang['turn_ins'] = '物品转移';
$lang['type'] = '种类';
$lang['update'] = '更新';
$lang['updated_by'] = '更新 By';
$lang['user'] = '用户';
$lang['username'] = '用户名';
$lang['value'] = 'PT值';
$lang['view'] = '查看';
$lang['view_action'] = '查看行为';
$lang['view_logs'] = '观察日志';

// Page Foot Counts
$lang['listadj_footcount']               = "... 创建 %1\$d 调节器 / %2\$d 每页";
$lang['listevents_footcount']            = "... 创建 %1\$d 活动 / %2\$d 每页";
$lang['listiadj_footcount']              = "... 创建 %1\$d 个人调节 / %2\$d 每页";
$lang['listitems_footcount']             = "... 创建 %1\$d 独特物品 / %2\$d 每页";
$lang['listmembers_active_footcount']    = "... 创建 %1\$d 活跃会员 / %2\$sShow All</a>";
$lang['listmembers_compare_footcount']   = "... 比较 %1\$d 会员";
$lang['listmembers_footcount']           = "... 创建 %1\$d 会员";
$lang['listnews_footcount']              = "... 创建 %1\$d 消息入口 / %2\$d 每页";
$lang['listpurchased_footcount']         = "... 创建 %1\$d 物品 / %2\$d 每页";
$lang['listraids_footcount']             = "... 创建 %1\$d raid(s) / %2\$d 每页";
$lang['stats_active_footcount']          = "... 创建 %1\$d 活跃会员 / %2\$s显舅�</a>";
$lang['stats_footcount']                 = "... 创建 %1\$d 会员";
$lang['viewevent_footcount']             = "... 创建 %1\$d raid(s)";
$lang['viewitem_footcount']              = "... 创建 %1\$d 物品";
$lang['viewmember_adjustment_footcount'] = "... 创建 %1\$d 个人调节";
$lang['viewmember_item_footcount']       = "... 创建 %1\$d 购买物品 / %2\$d 每页";
$lang['viewmember_raid_footcount']       = "... 创建 %1\$d 出席 raid(s) / %2\$d 每页";
$lang['viewraid_attendees_footcount']    = "... 创建 %1\$d 出席者";
$lang['viewraid_drops_footcount']        = "... 创建 %1\$d 掉落";

// Submit Buttons
$lang['close_window'] = '关闭窗口';
$lang['compare_members'] = '会员对比';
$lang['create_news_summary'] = '新建消息概要';
$lang['login'] = '登入';
$lang['logout'] = '登出';
$lang['log_add_data'] = '表格中添加�';
$lang['lost_password'] = '丢苈�';
$lang['no'] = '否';
$lang['proceed'] = '继续';
$lang['reset'] = '重置';
$lang['set_admin_perms'] = '设置管理员许可';
$lang['submit'] = '提交';
$lang['upgrade'] = '更新';
$lang['yes'] = '�';

// Form Element Descriptions
$lang['admin_login'] = '管理员登入';
$lang['confirm_password'] = '确认密码';
$lang['confirm_password_note'] = '如果上面已更改，只须确认新的密码';
$lang['current_password'] = '当前密码';
$lang['current_password_note'] = '如果想要更改用户名/密码，请确认当前密码';
$lang['email'] = 'Email';
$lang['email_address'] = 'Email 地址';
$lang['ending_date'] = '终止日期';
$lang['from'] = '从';
$lang['guild_tag'] = '公会标�';
$lang['language'] = '语言';
$lang['new_password'] = '新密码';
$lang['new_password_note'] = '如果想要更改密码，只须提够一个新的密码';
$lang['password'] = '密码';
$lang['remember_password'] = '记住我 (cookie)';
$lang['starting_date'] = '起既掌�';
$lang['style'] = '风格';
$lang['to'] = '到';
$lang['username'] = '用户名';
$lang['users'] = '用户';

// Pagination
$lang['next_page'] = '下页';
$lang['page'] = '页';
$lang['previous_page'] = '上页';

// Permission Messages
$lang['noauth_default_title'] = '权限拒绝';
$lang['noauth_u_event_list'] = '你没有列出活动的权限.';
$lang['noauth_u_event_view'] = '你没有查看活动的权限.';
$lang['noauth_u_item_list'] = '你没有列出物品的权限.';
$lang['noauth_u_item_view'] = '你没有查看物品的权限.';
$lang['noauth_u_member_list'] = '你没有查看会员状态的权限.';
$lang['noauth_u_member_view'] = '你没有查看会员历返娜ㄏ�.';
$lang['noauth_u_raid_list'] = '你没有列出raids的权限.';
$lang['noauth_u_raid_view'] = '你没有查看raids的权限.';

// Submission Success Messages
$lang['add_itemvote_success'] = '你关于这件物品的投票已经记录.';
$lang['update_itemvote_success'] = '你关于这件物品的投票已经更新.';
$lang['update_settings_success'] = '用户设置已经更新.';

// Form Validation Errors
$lang['fv_alpha_attendees'] = '角色\' EQ中的姓名（只包含字母）.';
$lang['fv_already_registered_email'] = 'e-mail地址已经注册.';
$lang['fv_already_registered_username'] = '用户名已经注册.';
$lang['fv_difference_transfer'] = '历芳吐甲票匦朐诹讲煌酥�.';
$lang['fv_difference_turnin'] = 'turn-in必须在两不同人之间.';
$lang['fv_invalid_email'] = 'e-mail地址无效.';
$lang['fv_match_password'] = '密码必须匹配.';
$lang['fv_member_associated']  = "%1\$s 已经关联其他用户账号.";
$lang['fv_number'] = '必须驱字.';
$lang['fv_number_adjustment'] = '调节值必须驱字.';
$lang['fv_number_alimit'] = '调节限制必须驱字.';
$lang['fv_number_ilimit'] = '物品限制必须驱字.';
$lang['fv_number_inactivepd'] = '未激活逼诒匦肭�.';
$lang['fv_number_pilimit'] = '购买物品限制必须驱字.';
$lang['fv_number_rlimit'] = 'raids限制必须驱字.';
$lang['fv_number_value'] = '值必须驱字.';
$lang['fv_number_vote'] = '投票必须驱字.';
$lang['fv_range_day'] = '日 必须�1-31的整�.';
$lang['fv_range_hour'] = '� 必须�1-23的整�.';
$lang['fv_range_minute'] = '分钟 必须�1-59的整�.';
$lang['fv_range_month'] = '月 必须�1-12的整�.';
$lang['fv_range_second'] = '秒 必须�0-59的整�.';
$lang['fv_range_year'] = '年 必须谴笥�1998的整�.';
$lang['fv_required'] = 'Required Field';
$lang['fv_required_acro'] = '公会鬃帜杆跣床荒芪�.';
$lang['fv_required_adjustment'] = '调节值不能为空.';
$lang['fv_required_attendees'] = 'raid至少要有一个参加者.';
$lang['fv_required_buyer'] = '必须选择一个顾客.';
$lang['fv_required_buyers'] = '必须选择至少一个顾客.';
$lang['fv_required_email'] = 'e-mail地址不能为空.';
$lang['fv_required_event_name'] = '一项活动必须选择.';
$lang['fv_required_guildtag'] = '公会标静荒芪�.';
$lang['fv_required_headline'] = '标题不能为空.';
$lang['fv_required_inactivepd'] = 'If the hide inactive members field is set to Yes, a value for the inactive period must also be set.';
$lang['fv_required_item_name'] = '物品名称项必须填写，或者选择一个已存在的物品.';
$lang['fv_required_member'] = '一个会员必须被选中.';
$lang['fv_required_members'] = '至少一个会员必须被选中.';
$lang['fv_required_message'] = '消息 不能为空.';
$lang['fv_required_name'] = '名字 不能为空.';
$lang['fv_required_password'] = '密码 不能为空.';
$lang['fv_required_raidid'] = '一次raid必须被选中.';
$lang['fv_required_user'] = '用户名 不能为空.';
$lang['fv_required_value'] = '值 不能为空.';
$lang['fv_required_vote'] = '投票 不能为空.';

// Miscellaneous
$lang['added'] = '增加';
$lang['additem_raidid_note'] = "只有两周以内的RAID会被显� / %1\$s显舅�</a>";
$lang['additem_raidid_showall_note'] = '显舅衦aids';
$lang['addraid_datetime_note'] = '解析log保掌诤捅间会自动.';
$lang['addraid_value_note'] = '单次奖励，如果遗留空格，会褂醚《ɑ疃哪现�';
$lang['add_items_from_raid'] = '本次Raid增加的物品';
$lang['deleted'] = '已删除';
$lang['done'] = '完成';
$lang['enter_new'] = '新登录';
$lang['error'] = '错误';
$lang['head_admin'] = '紫芾碓�';
$lang['hold_ctrl_note'] = '按住CTRL进行多选';
$lang['list'] = '列表';
$lang['list_groupadj'] = '列出团队调节';
$lang['list_events'] = '列出活动';
$lang['list_indivadj'] = '列出个人调节';
$lang['list_items'] = '列出物品';
$lang['list_members'] = '列出会员';
$lang['list_news'] = '列出消息';
$lang['list_raids'] = '列出Raids';
$lang['may_be_negative_note'] = '可能被拒绝';
$lang['not_available'] = '不可见';
$lang['no_news'] = 'No news entries found.';
$lang['of_raids'] = "%1\$d%% of raids";
$lang['or'] = '或者';
$lang['powered_by'] = 'Powered by';
$lang['preview'] = '预览';
$lang['required_field_note'] = '标注*的必须填写.';
$lang['select_1ofx_members'] = "选择 1 of %1\$d 会员...";
$lang['select_existing'] = '选择退出';
$lang['select_version'] = '选择想升级的EQdkp版本';
$lang['success'] = '成功';
$lang['s_admin_note'] = '这些项不能被用户改变.';
$lang['transfer_member_history_description'] = '这将转移一个会员所有的历� (raids, 物品, adjustments) 到另一个会员.';
$lang['updated'] = '已更新';
$lang['upgrade_complete'] = '你的EQdkp安装程序已经成功升级.<br /><br /><b class="negative">为安全起见，请移除此文件！</b>';

// Settings
$lang['account_settings'] = '账号设置';
$lang['adjustments_per_page'] = '调节每页';
$lang['basic'] = '基础';
$lang['events_per_page'] = '录恳�';
$lang['items_per_page'] = '物品每页';
$lang['news_per_page'] = '消息入口每页';
$lang['raids_per_page'] = 'Raids每页';
$lang['associated_members'] = 'Associated Members';
$lang['guild_members'] = '公会会员';

// Error messages
$lang['error_account_inactive'] = '账号没有激活.';
$lang['error_already_activated'] = '账号已经存在.';
$lang['error_invalid_email'] = '无效e-mail地址.';
$lang['error_invalid_event_provided'] = '无效 event id.';
$lang['error_invalid_item_provided'] = '无效 item id.';
$lang['error_invalid_key'] = '无效激活关键字.';
$lang['error_invalid_name_provided'] = '无效会员名称.';
$lang['error_invalid_news_provided'] = '无效消息 id.';
$lang['error_invalid_raid_provided'] = '无效raid id.';
$lang['error_user_not_found'] = '无效用户名称';
$lang['incorrect_password'] = '密码错误';
$lang['invalid_login'] = '用户名/密码 错误或者不存在';
$lang['not_admin'] = '你不枪芾碓�';

// Registration
$lang['account_activated_admin']   = '账号已激活.e-mail已发送.';
$lang['account_activated_user']    = "账号已经激活，现在可以 %1\$s登入%2\$s.";
$lang['password_sent'] = '新的密码已经通过e_mail发给你了.';
$lang['register_activation_self']  = "账号已经创建, 但枪用之前必须激活.<br /><br />e-mail已经发送到 %1\$s 里面包含了如何激活账号的信息.";
$lang['register_activation_admin'] = "账号已经创建, 但枪用之前管理员必须激活它.<br /><br />e-mail已经发送到 %1\$s 里面包含更多信息.";
$lang['register_activation_none']  = "账号已经创建，你现在可以 %1\$s登入%2\$s.<br /><br />e-mail已经发送到 %3\$s 里面包含更多信息.";
?>
