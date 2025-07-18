<?php
/******************************
 * EQdkp
 * Copyright 2002-2003
 * Licensed under the GNU GPL.  See COPYING for full terms.
 * ------------------
 * lang_admin.php
 * Began: Fri January 3 2003
 * 
 * $Id: lang_admin.php 33 2006-05-08 18:00:40Z tsigo $
 * Chinese Simp  converted by  Aoiete     aoiete@gmail.com    WWW.Replays.Net 
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
$lang['addadj_title']         = '添加团队调节';
$lang['addevent_title']       = '添加事件';
$lang['addiadj_title']        = '添加个人调节';
$lang['additem_title']        = '添加物品购买';
$lang['addmember_title']      = '添加公会成员';
$lang['addnews_title']        = '添加新闻条目';
$lang['addraid_title']        = '添加一个Raid';
$lang['addturnin_title']      = "添加 Turn-in - Step %1\$d";
$lang['admin_index_title']    = 'WOWdkp 管理';
$lang['config_title']         = '脚本 配置';
$lang['manage_members_title'] = '管理公会成员';
$lang['manage_users_title']   = '用户账号和权限';
$lang['parselog_title']       = '解析日志文件';
$lang['plugins_title']        = '插件管理';
$lang['styles_title']         = '风格管理';
$lang['viewlogs_title']       = '日志阅读';

// Page Foot Counts
$lang['listusers_footcount']             = "... 找到 %1\$d 位用户 / %2\$d 位每页";
$lang['manage_members_footcount']        = "... 找到 %1\$d 位会员";
$lang['online_footcount']                = "... %1\$d 位会员在线";
$lang['viewlogs_footcount']              = "... 找到 %1\$d 个日志 / %2\$d 个每页";

// Submit Buttons
$lang['add_adjustment'] = '添加 调整额';
$lang['add_account'] = '添加账号';
$lang['add_event'] = 'Add events';
$lang['add_item'] = '添加物品';
$lang['add_member'] = '添加会员';
$lang['add_news'] = '添加新闻';
$lang['add_raid'] = 'Add Raid';
$lang['add_style'] = '添加风格';
$lang['add_turnin'] = '添加Turn-in';
$lang['delete_adjustment'] = '删除调整额';
$lang['delete_event'] = '删除事件';
$lang['delete_item'] = '删除物品';
$lang['delete_member'] = '删除会员';
$lang['delete_news'] = '删除新闻';
$lang['delete_raid'] = '删除Raid';
$lang['delete_selected_members'] = '删除选定会员';
$lang['delete_style'] = '删除风格样式';
$lang['mass_delete'] = '群体删除';
$lang['mass_update'] = '群体更新';
$lang['parse_log'] = '解析日志';
$lang['search_existing'] = '搜索存在数据';
$lang['select'] = '选择';
$lang['transfer_history'] = '转移历史记录';
$lang['update_adjustment'] = '更新调节';
$lang['update_event'] = '更新事件';
$lang['update_item'] = '更新物品';
$lang['update_member'] = '更新会员';
$lang['update_news'] = '更新新闻';
$lang['update_raid'] = '更新Raid';
$lang['update_style'] = '更新风格样式';

// Misc
$lang['account_enabled'] = '账号激活';
$lang['adjustment_value'] = '调节点数值';
$lang['adjustment_value_note'] = 'You can use negative Value';
$lang['code'] = '加码';
$lang['contact'] = '联系人';
$lang['create'] = '创建';
$lang['found_members'] = "解析 %1\$d 几行, 找到 %2\$d 位成员";
$lang['headline'] = '大标题';
$lang['hide'] = '隐藏?';
$lang['install'] = '安装';
$lang['item_search'] = '物品搜索';
$lang['list_prefix'] = '前缀列表';
$lang['list_suffix'] = '后缀列表';
$lang['logs'] = '日志';
$lang['log_find_all'] = '查找所有 (包括匿名)';
$lang['manage_members'] = '会员管理';
$lang['manage_plugins'] = '插件管理';
$lang['manage_users'] = '用户管理';
$lang['mass_update_note'] = '如果你想让所有你选择项目得到应用和更新,请用这些控制器来改变属性. 然后选择"群体更新".
                             删除所选账号, 按 "群体删除".';
$lang['members'] = '会员';
$lang['member_rank'] = '会员级别';
$lang['message_body'] = '消息主体';
$lang['results'] = "%1\$d 结果 (\"%2\$s\")";
$lang['search'] = 'search';
$lang['search_members'] = '查找会员';
$lang['should_be'] = '应该是';
$lang['styles'] = '风格样式';
$lang['title'] = '标题';
$lang['uninstall'] = '卸载';
$lang['update_date_to'] = "更新日期至<br />%1\$s?";
$lang['version'] = '版本';
$lang['x_members_s'] = "%1\$d 会员";
$lang['x_members_p'] = "%1\$d 会员s";

// Permission Messages
$lang['noauth_a_event_add']    = '你没有权限添加事件.';
$lang['noauth_a_event_upd']    = '你没有权限更新事件.';
$lang['noauth_a_event_del']    = '你没有权限删除事件.';
$lang['noauth_a_groupadj_add'] = '你没有权限添加团队调节.';
$lang['noauth_a_groupadj_upd'] = '你没有权限更新团队调节.';
$lang['noauth_a_groupadj_del'] = '你没有权限删除团队调节.';
$lang['noauth_a_indivadj_add'] = '你没有权限添加个人调节.';
$lang['noauth_a_indivadj_upd'] = '你没有权限更新个人调节.';
$lang['noauth_a_indivadj_del'] = '你没有权限删除个人调节.';
$lang['noauth_a_item_add']     = '你没有权限添加物品.';
$lang['noauth_a_item_upd']     = '你没有权限更新物品.';
$lang['noauth_a_item_del']     = '你没有权限删除物品.';
$lang['noauth_a_news_add']     = '你没有权限添加新闻条目.';
$lang['noauth_a_news_upd']     = '你没有权限更新新闻条目.';
$lang['noauth_a_news_del']     = '你没有权限删除新闻条目.';
$lang['noauth_a_raid_add']     = '你没有权限添加RAIDs.';
$lang['noauth_a_raid_upd']     = '你没有权限更新RAIDs.';
$lang['noauth_a_raid_del']     = '你没有权限删除RAIDs.';
$lang['noauth_a_turnin_add']   = '你没有权限添加 turn-ins.';
$lang['noauth_a_config_man']   = '你没有权限管理DKP系统 常规设置�.';
$lang['noauth_a_members_man']  = '你没有权限管理公会成员.';
$lang['noauth_a_plugins_man']  = '你没有权限管理系统插件.';
$lang['noauth_a_styles_man']   = '你没有权限管理系统风格样式.';
$lang['noauth_a_users_man']    = '你没有权限管理用户账号设置.';
$lang['noauth_a_logs_view']    = '你没有权限查看系统日志.';

// Submission Success Messages
$lang['admin_add_adj_success']               = "A %1\$s adjustment of %2\$.2f has been added to the database for your guild.";
$lang['admin_add_admin_success']             = "An e-mail has been sent to %1\$s with their administrative information.";
$lang['admin_add_event_success']             = "A value preset of %1\$s for a raid on %2\$s has been added to the database for your guild.";
$lang['admin_add_iadj_success']              = "An individual %1\$s adjustment of %2\$.2f for %3\$s has been added to the database for your guild.";
$lang['admin_add_item_success']              = "An item purchase entry for %1\$s, purchased by %2\$s for %3\$.2f has been added to the database for your guild.";
$lang['admin_add_member_success']            = "%1\$s has been added as a member of your guild.";
$lang['admin_add_news_success']              = 'The news entry has been added to the database for your guild.';
$lang['admin_add_raid_success']              = "The %1\$d/%2\$d/%3\$d raid on %4\$s has been added to the database for your guild.";
$lang['admin_add_style_success']             = 'The new style has been added successfully.';
$lang['admin_add_turnin_success']            = "%1\$s has been transferred from %2\$s to %3\$s.";
$lang['admin_delete_adj_success']            = "The %1\$s adjustment of %2\$.2f has been deleted from the database for your guild.";
$lang['admin_delete_admins_success']         = "The selected administrators have been deleted.";
$lang['admin_delete_event_success']          = "The value preset of %1\$s for a raid on %2\$s has been deleted from the database for your guild.";
$lang['admin_delete_iadj_success']           = "The individual %1\$s adjustment of %2\$.2f for %3\$s has been deleted from the database for your guild.";
$lang['admin_delete_item_success']           = "The item purchase entry for %1\$s, purchased by %2\$s for %3\$.2f has been deleted from the database for your guild.";
$lang['admin_delete_members_success']        = "%1\$s, including all of his/her history, has been deleted from the database for your guild.";
$lang['admin_delete_news_success']           = 'The news entry has been deleted from the database for your guild.';
$lang['admin_delete_raid_success']           = 'The raid and any items associated with it have been deleted from the database for your guild.';
$lang['admin_delete_style_success']          = 'The style has been deleted successfully.';
$lang['admin_delete_user_success']           = "The account with a username of %1\$s has been deleted.";
$lang['admin_set_perms_success']             = "All administrative permissions have been updated.";
$lang['admin_transfer_history_success']      = "All of %1\$s\'s history has been transferred to %2\$s and %1\$s has been deleted from the database for your guild.";
$lang['admin_update_account_success']        = "Your account settings have been updated in the database.";
$lang['admin_update_adj_success']            = "The %1\$s adjustment of %2\$.2f has been updated in the database for your guild.";
$lang['admin_update_event_success']          = "The value preset of %1\$s for a raid on %2\$s has been updated in the database for your guild.";
$lang['admin_update_iadj_success']           = "The individual %1\$s adjustment of %2\$.2f for %3\$s has been updated in the database for your guild.";
$lang['admin_update_item_success']           = "The item purchase entry for %1\$s, purchased by %2\$s for %3\$.2f has been updated in the database for your guild.";
$lang['admin_update_member_success']         = "Membership settings for %1\$s have been updated.";
$lang['admin_update_news_success']           = 'The news entry has been updated in the database for your guild.';
$lang['admin_update_raid_success']           = "The %1\$d/%2\$d/%3\$d raid on %4\$s has been updated in the database for your guild.";
$lang['admin_update_style_success']          = '风格样式已经成功更新.';

$lang['admin_raid_success_hideinactive']     = '正在更新 激活/非激活 玩家的状态...';

// Delete Confirmation Texts
$lang['confirm_delete_adj']     = '确定删除团队调节?';
$lang['confirm_delete_admins']  = '确定删除选定管理员?';
$lang['confirm_delete_event']   = '确定删除这个事件?';
$lang['confirm_delete_iadj']    = '确定删除个人调节?';
$lang['confirm_delete_item']    = '确定删除选定物品?';
$lang['confirm_delete_members'] = '确定删除以下会员?';
$lang['confirm_delete_news']    = '确定删除这条新闻?';
$lang['confirm_delete_raid']    = '确定删除这个Raid?';
$lang['confirm_delete_style']   = '确定删除这个风格样式?';
$lang['confirm_delete_users']   = '确定删除以下用户账号?';

// Log Actions
$lang['action_event_added']      = '已经添加的事件';
$lang['action_event_deleted']    = '已经删除的事件';
$lang['action_event_updated']    = '已经更新的事件';
$lang['action_groupadj_added']   = '已经添加的团队调节';
$lang['action_groupadj_deleted'] = '已经删除的团队调节';
$lang['action_groupadj_updated'] = '已经更新的团队调节';
$lang['action_history_transfer'] = '会员历史记录转移';
$lang['action_indivadj_added']   = '已经添加的个人调节';
$lang['action_indivadj_deleted'] = '已经删除的个人调节';
$lang['action_indivadj_updated'] = '已经更新的个人调节';
$lang['action_item_added']       = '已经添加的物品';
$lang['action_item_deleted']     = '已经删除的物品';
$lang['action_item_updated']     = '已经更新的物品';
$lang['action_member_added']     = '已经添加的会员';
$lang['action_member_deleted']   = '已经删除的会员';
$lang['action_member_updated']   = '已经更新的会员';
$lang['action_news_added']       = '已经添加的新闻';
$lang['action_news_deleted']     = '已经删除的新闻';
$lang['action_news_updated']     = '已经更新的新闻';
$lang['action_raid_added']       = '已经添加的RAID';
$lang['action_raid_deleted']     = '已经删除的RAID';
$lang['action_raid_updated']     = '已经更新的RAID';
$lang['action_turnin_added']     = '已经添加Turn-in';

// Before/After
$lang['adjustment_after']  = 'Adjustment After';
$lang['adjustment_before'] = 'Adjustment Before';
$lang['attendees_after']   = 'Attendees After';
$lang['attendees_before']  = 'Attendees Before';
$lang['buyers_after']      = 'Buyer After';
$lang['buyers_before']     = 'Buyer Before';
$lang['class_after']       = 'Class After';
$lang['class_before']      = 'Class Before';
$lang['earned_after']      = 'Earned After';
$lang['earned_before']     = 'Earned Before';
$lang['event_after']       = 'Event After';
$lang['event_before']      = 'Event Before';
$lang['headline_after']    = 'Headline After';
$lang['headline_before']   = 'Headline Before';
$lang['level_after']       = 'Level After';
$lang['level_before']      = 'Level Before';
$lang['members_after']     = 'Members After';
$lang['members_before']    = 'Members Before';
$lang['message_after']     = 'Message After';
$lang['message_before']    = 'Message Before';
$lang['name_after']        = 'Name After';
$lang['name_before']       = 'Name Before';
$lang['note_after']        = 'Note After';
$lang['note_before']       = 'Note Before';
$lang['race_after']        = 'Race After';
$lang['race_before']       = 'Race Before';
$lang['raid_id_after']     = 'Raid ID After';
$lang['raid_id_before']    = 'Raid ID Before';
$lang['reason_after']      = 'Reason After';
$lang['reason_before']     = 'Reason Before';
$lang['spent_after']       = 'Spent After';
$lang['spent_before']      = 'Spent Before';
$lang['value_after']       = 'Value After';
$lang['value_before']      = 'Value Before';

// Configuration
$lang['general_settings'] = '常规设置';
$lang['guildtag'] = '公会名称/标签';
$lang['guildtag_note'] = '在最近的各页中使用的标题';
$lang['parsetags'] = '解析公会标签';
$lang['parsetags_note'] = '当解析RAID 日志时, 以下列出的将以选项形式被应用.';
$lang['domain_name'] = '域名';
$lang['server_port'] = '服务器端口';
$lang['server_port_note'] = '你的网页服务器端口 通常为 80';
$lang['script_path'] = '脚本路径';
$lang['script_path_note'] = 'dkp系统的放置路径, 相对于域名';
$lang['site_name'] = '站点名称';
$lang['site_description'] = '站点描述';
$lang['point_name'] = '点数名称';
$lang['point_name_note'] = '举例: DKP, RP, 等等.';
$lang['enable_account_activation'] = '起用账号激活';
$lang['none'] = '无';
$lang['admin'] = '管理员';
$lang['default_language'] = '默认语言';
$lang['default_style'] = '默认风格样式';
$lang['default_page'] = '默认首页';
$lang['hide_inactive'] = '赢藏没有激活的会员';
$lang['hide_inactive_note'] = '赢藏 在没有很多活动时期没有参加Raid 的会员?';
$lang['inactive_period'] = '非活跃时期';
$lang['inactive_period_note'] = '确定多少时间会员不参加Raid 仍然视为活跃会员';
$lang['inactive_point_adj'] = '非活跃点数调节';
$lang['inactive_point_adj_note'] = '当成为非活跃会员需要调节的点数.';
$lang['active_point_adj'] = '活跃点数调节';
$lang['active_point_adj_note'] = '当成为活跃会员需要调节的点数.';
$lang['enable_gzip'] = '允许 Gzip 压缩形式';
$lang['show_item_stats'] = '显示物品状态';
$lang['show_item_stats_note'] = '试图从网上获取物品状态, 可能影响到某些页面的速度';
$lang['default_permissions'] = '默认权限';
$lang['default_permissions_note'] = '这些权限是如下用户使用1 没有登录用户 2 新注册用户.  选项以<b>粗体</b>显示的是管理员权限
																		 建议不要把这些选项设成默认值, <i>斜体字</i>是给专门插件使用.  你可以在未来改变相应的个人权限来管理用户.';
$lang['plugins'] = '插件';
$lang['cookie_settings'] = 'Cookie 设置';
$lang['cookie_domain'] = 'Cookie 域名';
$lang['cookie_name'] = 'Cookie 名字';
$lang['cookie_path'] = 'Cookie 路径';
$lang['session_length'] = 'Session 长度 (秒)';
$lang['email_settings'] = 'E-Mail 设置';
$lang['admin_email'] = '管理员 E-Mail 地址';

// Admin Index
$lang['anonymous'] = '匿名用户';
$lang['database_size'] = '数据库大小';
$lang['eqdkp_started'] = 'EQdkp起点';
$lang['ip_address'] = 'IP地址';
$lang['items_per_day'] = '平均每天的物品';
$lang['last_update'] = '最后的更新';
$lang['location'] = '位置';
$lang['new_version_notice'] = "EQdkp version %1\$s is <a href=\"http://sourceforge.net/project/showfiles.php?group_id=69529\" target=\"_blank\">available for download</a>.";
$lang['number_of_items'] = '物品的数量';
$lang['number_of_logs'] = '日志的数量';
$lang['number_of_members'] = 'raid次数 (活跃的 / 非活跃的)';
$lang['number_of_raids'] = 'raid次数';
$lang['raids_per_day'] = '平均每天的raid';
$lang['statistics'] = '统计表';
$lang['totals'] = '总数';
$lang['version_update'] = '版本更新';
$lang['who_online'] = '在先用户';

// Style Management
$lang['style_settings'] = '风格样式设置';
$lang['style_name'] = '风格样式名字';
$lang['template'] = '模板';
$lang['element'] = '元素';
$lang['background_color'] = '背景颜色';
$lang['fontface1'] = '字体外观1';
$lang['fontface1_note'] = '默认字体外观';
$lang['fontface2'] = '字体外观2';
$lang['fontface2_note'] = '输入框内的字体外观';
$lang['fontface3'] = '字体外观3';
$lang['fontface3_note'] = '当前没被使用的';
$lang['fontsize1'] = '字体大小1';
$lang['fontsize1_note'] = '小字体l';
$lang['fontsize2'] = '字体大小2';
$lang['fontsize2_note'] = '中字体2';
$lang['fontsize3'] = '字体大小3';
$lang['fontsize3_note'] = '大字体3';
$lang['fontcolor1'] = '字体颜色1';
$lang['fontcolor1_note'] = '默认颜色';
$lang['fontcolor2'] = '字体颜色2';
$lang['fontcolor2_note'] = '外表格使用的颜色(菜单, 标题, 版权)';
$lang['fontcolor3'] = '字体颜色3';
$lang['fontcolor3_note'] = '输入框区域内部的字体颜色';
$lang['fontcolor_neg'] = '负数的字体颜色';
$lang['fontcolor_neg_note'] = '应用与负数数字的字体颜色?';
$lang['fontcolor_pos'] = '正数的字体颜色';
$lang['fontcolor_pos_note'] = '应用与正数数字的字体颜色?';
$lang['body_link'] = '链接颜色';
$lang['body_link_style'] = '链接样式';
$lang['body_hlink'] = '悬浮链接颜色';
$lang['body_hlink_style'] = '悬浮链接样式';
$lang['header_link'] = '标题链接';
$lang['header_link_style'] = '标题链接样式';
$lang['header_hlink'] = '悬浮标题链接';
$lang['header_hlink_style'] = '悬浮的标题链接样式';
$lang['tr_color1'] = '表格行颜色1';
$lang['tr_color2'] = '表格行颜色2';
$lang['th_color1'] = '表格标题颜色';
$lang['table_border_width'] = '表格边框宽度';
$lang['table_border_color'] = '表格边框颜色';
$lang['table_border_style'] = '表格边框样式';
$lang['input_color'] = '输入框的背景颜色';
$lang['input_border_width'] = '输入框的边框宽度';
$lang['input_border_color'] = '输入框的边框颜色';
$lang['input_border_style'] = '输入框的边框样式';
$lang['style_configuration'] = '风格样式配置';
$lang['style_date_note'] = 'For date/time fields, the syntax used is identical to the PHP <a href="http://www.php.net/manual/en/function.date.php" target="_blank">date()</a> function.';
$lang['attendees_columns'] = '出席者';
$lang['attendees_columns_note'] = '查看raid出席者数量';
$lang['date_notime_long'] = '日期没有确定时间 (长期)';
$lang['date_notime_short'] = '日期没有确定时间 (短期)';
$lang['date_time'] = '日期和时间';
$lang['logo_path'] = 'Logo文件名';

// Errors
$lang['error_invalid_adjustment'] = '不是一个有效的调整.';
$lang['error_invalid_plugin']     = '不是个有效的插件.';
$lang['error_invalid_style']      = '不是个有效的风格类型.';

// Verbose log entry lines
$lang['new_actions']           = '最近管理员操作';
$lang['vlog_event_added']      = "%1\$s 添加选定事件 '%2\$s' 价值 %3\$.2f 点数.";
$lang['vlog_event_updated']    = "%1\$s 更新选定事件 '%2\$s'.";
$lang['vlog_event_deleted']    = "%1\$s 删除选定事件 '%2\$s'.";
$lang['vlog_groupadj_added']   = "%1\$s 添加整团队调节 %2\$.2f 点数.";
$lang['vlog_groupadj_updated'] = "%1\$s 更新整团队调节 %2\$.2f 点数.";
$lang['vlog_groupadj_deleted'] = "%1\$s 删除整团队调节 %2\$.2f 点数.";
$lang['vlog_history_transfer'] = "%1\$s 转移 %2\$s'的历史记录o %3\$s.";
$lang['vlog_indivadj_added']   = "%1\$s 对于会员添加相应的个人点数调节 %2\$.2f  %3\$d .";
$lang['vlog_indivadj_updated'] = "%1\$s 更新相应的个人点数调节 %2\$.2f  %3\$s.";
$lang['vlog_indivadj_deleted'] = "%1\$s deleted an individual adjustment of %2\$.2f to %3\$s.";
$lang['vlog_item_added']       = "%1\$s 添加选定物品 '%2\$s' 给予 %3\$d member(s) for %4\$.2f points.";
$lang['vlog_item_updated']     = "%1\$s 更新选定物品 '%2\$s' 给予 %3\$d 会员.";
$lang['vlog_item_deleted']     = "%1\$s 删除选定物品 '%2\$s' 给予 %3\$d 会员.";
$lang['vlog_member_added']     = "%1\$s 添加选定会员 %2\$s.";
$lang['vlog_member_updated']   = "%1\$s 更新选定会员 %2\$s.";
$lang['vlog_member_deleted']   = "%1\$s 删除选定会员 %2\$s.";
$lang['vlog_news_added']       = "%1\$s 添加选定头目 '%2\$s'.";
$lang['vlog_news_updated']     = "%1\$s 更新选定条目 '%2\$s'.";
$lang['vlog_news_deleted']     = "%1\$s 删除选定条目 '%2\$s'.";
$lang['vlog_raid_added']       = "%1\$s 添加一个raid '%2\$s'.";
$lang['vlog_raid_updated']     = "%1\$s 更新一个raid '%2\$s'.";
$lang['vlog_raid_deleted']     = "%1\$s 删除一个raid '%2\$s'.";
$lang['vlog_turnin_added']     = "%1\$s 添加 turn-in 到 %2\$s to %3\$s for '%4\$s'.";

// Location messages
$lang['adding_groupadj'] = '添加团队调节器';
$lang['adding_indivadj'] = '添加个人调节器';
$lang['adding_item'] = '添加物品';
$lang['adding_news'] = '添加新闻条目';
$lang['adding_raid'] = 'Add Raid';
$lang['adding_turnin'] = '添加Turn-in';
$lang['editing_groupadj'] = '编辑调节团队信息';
$lang['editing_indivadj'] = '编辑调节个人信息';
$lang['editing_item'] = '编辑物品';
$lang['editing_news'] = '编辑新闻条目';
$lang['editing_raid'] = '编辑Raid';
$lang['listing_events'] = '事件列表';
$lang['listing_groupadj'] = '成员调节列表';
$lang['listing_indivadj'] = '个人调节器列表';
$lang['listing_itemhist'] = '物品历史记录列表';
$lang['listing_itemvals'] = '物品PT值列表';
$lang['listing_members'] = '会员列表';
$lang['listing_raids'] = 'Raid列表';
$lang['managing_config'] = '管理EQdkp配置';
$lang['managing_members'] = '管理工会成员';
$lang['managing_plugins'] = '插件管理';
$lang['managing_styles'] = '管理界面风格';
$lang['managing_users'] = '管理用户帐号';
$lang['parsing_log'] = '解析日志';
$lang['viewing_admin_index'] = '查看管理员索引';
$lang['viewing_event'] = '查看事件';
$lang['viewing_item'] = '查看物品';
$lang['viewing_logs'] = '查看记录';
$lang['viewing_member'] = '查看会员';
$lang['viewing_mysql_info'] = '查看MySQL信息';
$lang['viewing_news'] = '查看新闻';
$lang['viewing_raid'] = '查看Raid';
$lang['viewing_stats'] = '查看状态';
$lang['viewing_summary'] = '查看总共情况';

// Help lines
$lang['b_help'] = '粗体文本: [b]text[/b] (alt+b)';
$lang['i_help'] = '斜体文本: [i]text[/i] (alt+i)';
$lang['u_help'] = '下划线文本: [u]text[/u] (alt+u)';
$lang['q_help'] = '引用文本: [quote]text[/quote] (alt+q)';
$lang['c_help'] = '文本居中: [center]text[/center] (alt+c)';
$lang['p_help'] = '插入图片: [img]http://image_url[/img] (alt+p)';
$lang['w_help'] = '插入URL链接: [url]http://url[/url] or [url=http://url]URL text[/url]  (alt+w)';

// Manage Members Menu (yes, MMM)
$lang['add_member'] = '添加会员';
$lang['list_edit_del_member'] = '列表/删除/编辑 会员';
$lang['edit_ranks'] = '编辑会员等级';
$lang['transfer_history'] = '转移会员历史';

// MySQL info
$lang['mysql'] = 'MySQL';
$lang['mysql_info'] = 'MySQL信息';
$lang['eqdkp_tables'] = 'EQdkp表格';
$lang['table_name'] = '表格名称';
$lang['rows'] = '行';
$lang['table_size'] = '表格大小';
$lang['index_size'] = '索引大小';
$lang['num_tables'] = "%d 表格";
?>
