<?php if (!defined('THINK_PATH')) exit(); /*a:15:{s:41:"./template/pc/rainbow/designer\admin.html";i:1504258181;s:37:"./template/pc/rainbow/temp\modal.html";i:1504087310;s:43:"./template/pc/rainbow/temp\edit-topbar.html";i:1504166492;s:41:"./template/pc/rainbow/temp\edit-shop.html";i:1478662421;s:43:"./template/pc/rainbow/temp\edit-notice.html";i:1478662421;s:41:"./template/pc/rainbow/temp\edit-menu.html";i:1478662420;s:43:"./template/pc/rainbow/temp\edit-banner.html";i:1478662420;s:44:"./template/pc/rainbow/temp\edit-picture.html";i:1478662421;s:42:"./template/pc/rainbow/temp\edit-title.html";i:1478662421;s:43:"./template/pc/rainbow/temp\edit-search.html";i:1478662420;s:41:"./template/pc/rainbow/temp\edit-line.html";i:1478662421;s:42:"./template/pc/rainbow/temp\edit-blank.html";i:1478662421;s:42:"./template/pc/rainbow/temp\edit-goods.html";i:1478662421;s:45:"./template/pc/rainbow/temp\edit-richtext.html";i:1478662420;s:41:"./template/pc/rainbow/temp\edit-cube.html";i:1478662421;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>店铺装修</title>
    <link href="__PUBLIC__/designer/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="__PUBLIC__/designer/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="__PUBLIC__/designer/css/common.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">
        var require = { urlArgs: 'v=<?php echo date("YmdH"); ?>' };
    </script>
    <script type="text/javascript" src="__PUBLIC__/designer/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/designer/js/util.js"></script>
    <script type="text/javascript" src="__PUBLIC__/designer/js/require.js"></script>
    <script type="text/javascript" src="__PUBLIC__/designer/js/config.js"></script>
    <link href="__PUBLIC__/designer/designer.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- 头部选项卡 -->
<ul class="nav nav-tabs">
    <li><a href="<?php echo U('list'); ?>" >店铺装修</a></li>
    <li class="active"><a href="#">页面编辑</a></li>
    <li ><a href="<?php echo U('menu'); ?>" >自定义菜单</a></li>
</ul>
<!-- 编辑页面 -->
<div class='panel panel-default' ng-app="FoxEditor" style="background: #f2f2f2">
    <div class='panel-heading'> 页面编辑 <?php echo (isset($_GET['pageid']) && ($_GET['pageid'] !== '')?$_GET['pageid']:''); ?></div>
    <div class='panel-body' ng-controller="FoxController">
        <div class="fe-panel-menu">
            <!--插件菜单-->
            <div ng-repeat="nav in navs">
                <nav ng-bind="nav.name" ng-click="addItem(nav.id)"></nav>
            </div>
        </div>
        <div class="fe">
            <div class="fe-phone">

                <!--手机模型左边部分-->
                <div class="fe-phone-left"></div>
                <!--手机模型左边部分end-->

                <div class="fe-phone-center">
                    <!--手机模型顶部部分-->
                    <div class="fe-phone-top"></div>
                    <!--手机模型中间部分-->
                    <div class="fe-phone-main">
                        <div id="editor">
                            <div ng-repeat="page in pages">
                                <div ng-include="'/template/pc/rainbow/temp/show-'+page.temp+'.html'" id="{{page.id}}" mid="{{page.id}}" ng-click="setfocus(page.id,$event)"></div>
                            </div>

                            <div style="height: 50px;" ng-show="pages[0].params.guide==1"></div>

                            <div ng-repeat="Item in Items" class="fe-mod-repeat" ng-mouseover="over(Item.id)" ng-mouseleave="out(Item.id)">
                                <div class="fe-mod-move" ng-mouseover="drag(Item.id)" ng-click="setfocus(Item.id,$event)"></div>
                                <div ng-include="'/template/pc/rainbow/temp/show-'+Item.temp+'.html'" class="fe-mod-parent" id="{{Item.id}}" ng-show="Item" mid="{{Item.id}}" on-finish-render-filters></div>
                                <div class="fe-mod-del" ng-click="delItem(Item.id)">移除</div>
                            </div>

                            <!-- 浮动按钮 -->
                            <div class="fe-floatico" ng-show="pages[0].params.floatico==1" ng-style="{'width':pages[0].params.floatwidth,'top':pages[0].params.floattop}" ng-class="{'fe-floatico-right':pages[0].params.floatstyle=='right'}">
                                <img ng-src="{{pages[0].params.floatimg || '__PUBLIC__/designer/init-data/init-image-7.png'}}" style="height:100%; width: 100%;" ng-click="setfocus('M0000000000000')" />
                            </div>
                            <!-- 关注按钮 -->
                            <div class="fe-guide" ng-click="setfocus('M0000000000000')" ng-show="pages[0].params.guide==1" ng-style="{'display':'block','background-color':pages[0].params.guidebgcolor,'top':'60px','z-index':'890','opacity':pages[0].params.guideopacity}">
                                <div class="fe-guide-faceimg"><img ng-src="__PUBLIC__/designer/init-data/init-icon.png" ng-style="{'border-radius':pages[0].params.guidefacestyle}" /></div>
                                <div class="fe-guide-sub" ng-style="{'color':pages[0].params.guidenavcolor,'background-color':pages[0].params.guidenavbgcolor}">{{pages[0].params.guidesub ||'立即关注'}}</div>
                                <div class="fe-guide-text"  ng-style="{'font-size':pages[0].params.guidesize,'color':pages[0].params.guidecolor}">
                                    <p ng-class="{'fe-guide-lineheight':pages[0].params.guidetitle2==''}">{{pages[0].params.guidetitle1s || '加关注，做代理。'}}</p>
                                    <p ng-class="{'fe-guide-lineheight':pages[0].params.guidetitle1==''}">{{pages[0].params.guidetitle2s || '关注公众号，享专属服务'}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--手机模型中间部分end-->
                    <!--手机模型第部部分-->
                    <div class="fe-phone-bottom"></div>
                </div>
                <div class="fe-phone-right"></div>
            </div>
            <div class="fe-panel">

                <!-- editor start -->
                <div class="fe-panel-editor" ng-show="focus">
                    <div class="fe-panel-editor-ico"></div>
                    <div ng-repeat="Edit in pages">
                        <div ng-include="'edit-'+Edit.temp+'.html'" ng-show="focus==Edit.id" Editid="{{Edit.id}}" ></div>
                    </div>
                    <div ng-repeat="Edit in Items">
                        <div ng-include="'edit-'+Edit.temp+'.html'" ng-show="focus==Edit.id" Editid="{{Edit.id}}" tab-index="-1"></div>
                    </div>
                </div>
                <!-- editor end -->
            </div>
        </div>
        <!-- 页面底部保存栏 -->
        <div class="fe-save">
            <div class="fe-save-main">
                <div class="fe-save-info">
                    <div class="fe-save-info-type fe-save-info-type-ok" data-type="1">
                        <?php if($datas['pagetype'] == 1 or empty($datas['pagetype'])): ?>
                            <div class="fe-save-main-radio fe-save-main-radio2">√</div>
                            <?php else: ?>
                            <div class="fe-save-main-radio"></div>
                        <?php endif; ?>
                        <div class="fe-save-main-text">商城首页</div>
                    </div>
                    <div class="fe-save-info-type fe-save-info-type-ok" data-type="4">
                        <?php if($datas['pagetype'] == 4): ?>
                            <div class="fe-save-main-radio fe-save-main-radio2">√</div>
                            <?php else: ?>
                            <div class="fe-save-main-radio"></div>
                        <?php endif; ?>
                        <div class="fe-save-main-text">其他自定义页面</div>
                    </div>
                    <div class="fe-save-info-type" data-type="2">
                        <?php if($datas['pagetype'] == 2): ?>
                            <div class="fe-save-main-radio fe-save-main-radio2">√</div>
                            <?php else: ?>
                            <div class="fe-save-main-radio" style="border:2px solid #999; cursor: no-drop;"></div>
                        <?php endif; ?>
                        <div class="fe-save-main-text" style="color:#999; cursor: no-drop;">商品列表</div>
                    </div>
                    <div class="fe-save-info-type" data-type="3">
                        <?php if($datas['pagetype'] == 3): ?>
                            <div class="fe-save-main-radio fe-save-main-radio2">√</div>
                            <?php else: ?>
                            <div class="fe-save-main-radio" style="border:2px solid #999; cursor: no-drop;"></div>
                        <?php endif; ?>
                        <div class="fe-save-main-text" style="color:#999; cursor: no-drop;">商品详细</div>
                    </div>
                    <input name="pagetype" type="hidden" value="<?php echo (isset($datas['pagetype']) && ($datas['pagetype'] !== '')?$datas['pagetype']:'1'); ?>" />
                    <input name="pagename" type="text" style="height: 30px; width: 300px; border: 1px solid #bbb; border-radius: 3px; margin: 4px 10px; outline: none; padding-left: 10px;" placeholder="页面名称：快来给你的页面起一个响亮的名字" value="<?php echo $datas['pagename']; ?>"/>
                </div>
                <div class="fe-save-submit2" ng-click="save(2)">保存并预览</div>
                <div class="fe-save-submit" ng-click="save(1)">保存</div>
            </div>
            <div class="fe-save-fold" onclick="fold()"></div>
            <div class="fe-save-gotop" onclick="$(document.body).animate({scrollTop:0},500)"><i class="fa fa-angle-up"></i><br>返回顶部</div>
            <!--链接搜索页面-->
           <!-- {template 'modal'}-->
            <!-- 预览 start -->
<div id="modal-module-menus3"  class="modal fade" tabindex="-1">
    <div class="modal-dialog" style='width: 413px;'>
        <div class="fe-phone">
            <div class="fe-phone-left"></div>
            <div class="fe-phone-center">
                <div class="fe-phone-top"></div>
                <div class="fe-phone-main">
                    <iframe style="border:0px; width:342px; height:600px; padding:0px; margin: 0px;" src=""></iframe>
                </div>
                <div class="fe-phone-bottom" style="overflow:hidden;">
                    <div style="height:52px; width: 52px; border-radius: 52px; margin:20px 0px 0px 159px; cursor: pointer;" data-dismiss="modal" aria-hidden="true" title="点击关闭"></div>
                </div>
            </div>
            <div class="fe-phone-right"></div>
        </div>
    </div>
</div>
<!-- 预览 end -->

<!-- choose hrefurl start -->
<div id="floating-link"  class="modal fade" tabindex="-1" style="z-index:99999">
    <div class="modal-dialog" style='width: 920px;'>
        <div class="modal-content">
            <div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>选择链接</h3></div>
            <div class="modal-body" >
                <ul class="nav nav-tabs">
                    <li id="fe-tab-link-nav-1" class="active"><a href="javascript:switchtab('fe-tab-link',1);">商城页面</a></li>
                    <li id="fe-tab-link-nav-2"><a href="javascript:switchtab('fe-tab-link',2);">商品链接</a></li>
                    <!--<li id="fe-tab-link-nav-3"><a href="javascript:switchtab('fe-tab-link',3);">公告链接</a></li>-->
                    <li id="fe-tab-link-nav-4"><a href="javascript:switchtab('fe-tab-link',4);">商品分类</a></li>
                    <li id="fe-tab-link-nav-5"><a href="javascript:switchtab('fe-tab-link',5);">DIY页面</a></li>
                    {if p('article')}<li id="fe-tab-link-nav-6"><a href="javascript:switchtab('fe-tab-link',6);">文章营销页面</a></li>{/if}
                    {if p('coupon')}<li id="fe-tab-link-nav-7"><a href="javascript:switchtab('fe-tab-link',7);">超级券页面</a></li>{/if}
                </ul>
                <div>
                    <div class="fe-tab-link" id="fe-tab-link-1" style="display: block;">
                        <div class="page-header">
                            <h4><i class="fa fa-folder-open-o"></i> 商城页面链接</h4>
                        </div>
                        <div id="fe-tab-link-li-11" class="btn btn-default" ng-click="chooseLink(1, 11)" data-href="{php echo $this->createMobileUrl('shop/index')}">商城首页</div>
                        <div id="fe-tab-link-li-12" class="btn btn-default" ng-click="chooseLink(1, 12)" data-href="{php echo $this->createMobileUrl('shop/category')}">分类导航</div>
                        <div id="fe-tab-link-li-13" class="btn btn-default" ng-click="chooseLink(1, 13)" data-href="{php echo $this->createMobileUrl('shop/list')}">全部商品</div>
                        <div id="fe-tab-link-li-14" class="btn btn-default" ng-click="chooseLink(1, 14)" data-href="{php echo $this->createMobileUrl('shop/notice')}">公告页面</div>
                        <div class="page-header">
                            <h4><i class="fa fa-folder-open-o"></i> 会员中心链接</h4>
                        </div>
                        <div id="fe-tab-link-li-21" class="btn btn-default" ng-click="chooseLink(1, 21)" data-href="{php echo $this->createMobileUrl('member')}">会员中心</div>
                        <div id="fe-tab-link-li-22" class="btn btn-default" ng-click="chooseLink(1, 22)" data-href="{php echo $this->createMobileUrl('order')}">我的订单</div>
                        <div id="fe-tab-link-li-23" class="btn btn-default" ng-click="chooseLink(1, 23)" data-href="{php echo $this->createMobileUrl('shop/cart')}">我的购物车</div>
                        <div id="fe-tab-link-li-24" class="btn btn-default" ng-click="chooseLink(1, 24)" data-href="{php echo $this->createMobileUrl('shop/favorite')}">我的收藏</div>
                        <div id="fe-tab-link-li-25" class="btn btn-default" ng-click="chooseLink(1, 25)" data-href="{php echo $this->createMobileUrl('shop/history')}">我的足迹</div>
                        <div id="fe-tab-link-li-26" class="btn btn-default" ng-click="chooseLink(1, 26)" data-href="{php echo $this->createMobileUrl('member/recharge')}">会员充值</div>
                        <div id="fe-tab-link-li-27" class="btn btn-default" ng-click="chooseLink(1, 27)" data-href="{php echo $this->createMobileUrl('member/log')}">余额明细</div>
                        <div id="fe-tab-link-li-28" class="btn btn-default" ng-click="chooseLink(1, 28)" data-href="{php echo $this->createMobileUrl('member/withdraw')}">余额提现</div>
                        <div id="fe-tab-link-li-29" class="btn btn-default" ng-click="chooseLink(1, 29)" data-href="{php echo $this->createMobileUrl('shop/address')}">我的收货地址</div>

                        {if p('commission')}
                        <div class="page-header">
                            <h4><i class="fa fa-folder-open-o"></i> 加盟链接</h4>
                        </div>

                        <div id="fe-tab-link-li-31" class="btn btn-default" ng-click="chooseLink(1, 31)" data-href="{php echo $this->createPluginMobileUrl('commission')}">加盟中心</div>
                        <div id="fe-tab-link-li-32" class="btn btn-default" ng-click="chooseLink(1, 32)" data-href="{php echo $this->createPluginMobileUrl('commission/register')}">成为加盟商</div>
                        <div id="fe-tab-link-li-33" class="btn btn-default" ng-click="chooseLink(1, 33)" data-href="{php echo $this->createPluginMobileUrl('commission/myshop')}">我的小店</div>
                        <div id="fe-tab-link-li-34" class="btn btn-default" ng-click="chooseLink(1, 34)" data-href="{php echo $this->createPluginMobileUrl('commission/withdraw')}">佣金提现</div>
                        <div id="fe-tab-link-li-35" class="btn btn-default" ng-click="chooseLink(1, 35)" data-href="{php echo $this->createPluginMobileUrl('commission/order')}">加盟订单</div>
                        <div id="fe-tab-link-li-36" class="btn btn-default" ng-click="chooseLink(1, 36)" data-href="{php echo $this->createPluginMobileUrl('commission/team')}">我的团队</div>
                        <div id="fe-tab-link-li-37" class="btn btn-default" ng-click="chooseLink(1, 37)" data-href="{php echo $this->createPluginMobileUrl('commission/log')}">佣金明细</div>
                        <div id="fe-tab-link-li-38" class="btn btn-default" ng-click="chooseLink(1, 38)" data-href="{php echo $this->createPluginMobileUrl('commission/myshop',array('op'=>'set'))}">小店设置</div>
                        <div id="fe-tab-link-li-39" class="btn btn-default" ng-click="chooseLink(1, 39)" data-href="{php echo $this->createPluginMobileUrl('commission/myshop',array('op'=>'select'))}">自选商品</div>
                        {/if}


                        {if p('coupon')}
                        <div class="page-header">
                            <h4><i class="fa fa-folder-open-o"></i> 超级券链接</h4>
                        </div>

                        <div id="fe-tab-link-li-40" class="btn btn-default" ng-click="chooseLink(1, 40)" data-href="{php echo $this->createPluginMobileUrl('coupon')}">优惠券领取中心</div>
                        <div id="fe-tab-link-li-41" class="btn btn-default" ng-click="chooseLink(1, 41)" data-href="{php echo $this->createPluginMobileUrl('coupon/my')}">我的优惠券</div>
                        {/if}



                    </div>

                    <div class="fe-tab-link" id="fe-tab-link-2">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" value="" id="select-good-kw" placeholder="请输入商品名称进行搜索">
                            <span class="input-group-btn"><button type="button" class="btn btn-default" ng-click="ajaxselect('good');" id="selectgood">搜索</button></span>
                        </div>
                        <div ng-repeat="good in temp.good">
                            <div class="fe-tab-link-line" style='height:60px;line-height:60px;float:left;width:100%;'>
                                <div class="fe-tab-link-sub"><a href="javascript:;" ng-click="chooseLink(2, good.id)">选择</a></div>
                                <div style="float:left;">
                                    <img src="{{good.thumb}}" style='width:50px;height:50px;padding:1px;border:1px solid #ccc' />
                                </div>

                                <div class="fe-tab-link-text" style="float:left" id="fe-tab-link-li-{{good.id}}"
                                     data-href="{php echo $this->createMobileUrl('shop/detail')}&id={{good.id}}"
                                        >

                                    {{good.title}}(现价:{{good.marketprice}}&nbsp;&nbsp;原价:{{good.productprice}})</div>
                            </div>

                        </div>
                        <p ng-show="temp.good == ''" style="padding:0px; margin-top: 120px; font-size: 16px; color: #aaa; text-align: center;">抱歉， 一个商品也没有找到~换个关键词试试~</p>
                    </div>

                    <div class="fe-tab-link" id="fe-tab-link-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" value="" id="select-notice-kw" placeholder=请输入公告标题进行搜索>
                            <span class="input-group-btn"><button type="button" class="btn btn-default" ng-click="ajaxselect('notice');" id="selectgood">搜索</button></span>
                        </div>
                        <div ng-repeat="notice in temp.notice">
                            <div class="fe-tab-link-line">
                                <div class="fe-tab-link-sub"><a href="javascript:;" ng-click="chooseLink(3, notice.id)">选择</a></div>
                                <div class="fe-tab-link-text" id="fe-tab-link-li-{{notice.id}}" data-href="notice id:{{notice.id}}">{{notice.title}}</div>
                            </div>
                        </div>
                        <p ng-show="temp.notice == ''" style="padding:0px; margin-top: 120px; font-size: 16px; color: #aaa; text-align: center;">抱歉， 一个公告也没有找到~换个关键词试试~</p>
                    </div>
                    <div class="fe-tab-link" id="fe-tab-link-4">
                        {loop $categorys $category}
                        {if empty($category['parentid'])}
                        <div class="fe-tab-link-line">
                            <div class="fe-tab-link-sub"><a href="javascript:;" ng-click="chooseLink(4, <?php echo $category['id']; ?>)">选择</a></div>
                            <div class="fe-tab-link-text" id="fe-tab-link-li-<?php echo $category['id']; ?>" data-href="{php echo $this->createMobileUrl('shop/list',array('pcate'=>$category['id']))}"><?php echo $category['name']; ?></div>
                        </div>
                        {loop $categorys $category2}
                        {if $category2['parentid']==$category['id']}
                        <div class="fe-tab-link-line">
                            <div class="fe-tab-link-sub"><a href="javascript:;" ng-click="chooseLink(4, <?php echo $category2['id']; ?>)">选择</a></div>
                            <div class="fe-tab-link-text" id="fe-tab-link-li-<?php echo $category2['id']; ?>" data-href="{php echo $this->createMobileUrl('shop/list',array('pcate'=>$category['id'],'ccate'=>$category2['id']))}"><span style='height:10px; width: 10px; margin-left: 10px; margin-right: 10px; display:inline-block; border-bottom: 1px dashed #ddd; border-left: 1px dashed #ddd;'></span><?php echo $category2['name']; ?></div>
                        </div>
                        {loop $categorys $category3}
                        {if $category3['parentid']==$category2['id']}
                        <div class="fe-tab-link-line">
                            <div class="fe-tab-link-sub"><a href="javascript:;" ng-click="chooseLink(4, <?php echo $category3['id']; ?>)">选择</a></div>
                            <div class="fe-tab-link-text" id="fe-tab-link-li-<?php echo $category3['id']; ?>" data-href="{php echo $this->createMobileUrl('shop/list',array('pcate'=>$category['id'],'ccate'=>$category2['id'],'tcate'=>$category3['id']))}"><span style='height:10px; width: 10px; margin-left: 30px; margin-right: 10px; display:inline-block; border-bottom: 1px dashed #ddd; border-left: 1px dashed #ddd;'></span><?php echo $category3['name']; ?></div>
                        </div>
                        {/if}
                        {/loop}
                        {/if}
                        {/loop}
                        {/if}
                        {/loop}
                    </div>

                    <div class="fe-tab-link" id="fe-tab-link-5">
                        {loop $pages $pagelink}
                        <div class="fe-tab-link-line">
                            <div class="fe-tab-link-sub"><a href="javascript:;" ng-click="chooseLink(5, <?php echo $pagelink['id']; ?>)">选择</a></div>
                            <div class="fe-tab-link-text" id="fe-tab-link-li-<?php echo $pagelink['id']; ?>" data-href="{php echo $this->createPluginMobileUrl('designer',array('pageid'=>$pagelink['id']))}">
                                {if $pagelink['pagetype']=='1'}
                                <label class='label label-danger' style='margin-right:5px;'>首页</label>
                                {elseif $pagelink['pagetype']=='4'}
                                <label class='label label-primary' style='margin-right:5px;'>其他</label>
                                {/if}
                                {if $pagelink['setdefault']=='1'}
                                <label class='label label-success' style='margin-right:5px;'>默认首页</label>
                                {/if}
                                <?php echo $pagelink['pagename']; ?>
                            </div>
                        </div>
                        {/loop}
                    </div>

                    {if p('article')}
                    <div class="fe-tab-link" id="fe-tab-link-6">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" value="" id="select-article-kw" placeholder="请输入文章标题进行搜索">
                            <span class="input-group-btn"><button type="button" class="btn btn-default" ng-click="ajaxselect('article');" id="selectarticle">搜索</button></span>
                        </div>
                        <div ng-repeat="article in temp.article">
                            <div class="fe-tab-link-line">
                                <div class="fe-tab-link-sub"><a href="javascript:;" ng-click="chooseLink(6, article.id)">选择</a></div>
                                <div class="fe-tab-link-text" id="fe-tab-link-li-{{article.id}}" data-href="{php echo $this->createPluginMobileUrl('article')}&aid={{article.id}}">{{article.article_title}}</div>
                            </div>
                        </div>
                        <p ng-show="temp.article == ''" style="padding:0px; margin-top: 120px; font-size: 16px; color: #aaa; text-align: center;">抱歉， 一篇文章也没有找到~换个关键词试试~</p>
                    </div>
                    {/if}


                    {if p('coupon')}
                    <div class="fe-tab-link" id="fe-tab-link-7">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" value="" id="select-coupon-kw" placeholder="请输入优惠券名称进行搜索">
                            <span class="input-group-btn"><button type="button" class="btn btn-default" ng-click="ajaxselect('coupon');" id="selectcoupon">搜索</button></span>
                        </div>
                        <div ng-repeat="coupon in temp.coupon">
                            <div class="fe-tab-link-line">
                                <div class="fe-tab-link-sub"><a href="javascript:;" ng-click="chooseLink(7, coupon.id)">选择</a></div>
                                <div class="fe-tab-link-text" id="fe-tab-link-li-{{coupon.id}}" data-href="{php echo $this->createPluginMobileUrl('coupon/detail')}&id={{coupon.id}}">{{coupon.couponname}}</div>
                            </div>
                        </div>
                        <p ng-show="temp.coupon == ''" style="padding:0px; margin-top: 120px; font-size: 16px; color: #aaa; text-align: center;">抱歉， 一个优惠券也没有找到~换个关键词试试~</p>
                    </div>
                    {/if}

                </div>
            </div>
            <div class="modal-footer"><a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a></div>
        </div>
    </div>
</div>
<!-- choose hrefurl end -->

<!-- choose good start -->
<div id="floating-good"  class="modal fade" tabindex="-1" style="z-index:99999">
    <div class="modal-dialog" style='width: 920px;'>
        <div class="modal-content">
            <div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>选择商品</h3></div>
            <div class="modal-body" >
                <div class="row" style="padding:0px 15px;">
                    <div class="input-group">
                        <input type="text" class="form-control" name="keyword" value="" id="secect-kw" placeholder="请输入商品名称进行查询筛选" />
                        <span class='input-group-btn'><button type="button" class="btn btn-default" ng-click="selectgood(focus);" id="selectgood">搜索</button></span>
                    </div>
                </div>
                <div id="module-menus" style="padding-top:5px; overflow: auto;max-height:500px;">
                    <div ng-repeat="good in selectGoods">
                        <div style="height:177px; width:137px; float: left; padding: 5px; margin: 5px; background: #f4f4f4; margin-top: 5px;" ng-click="pushGood(focus, good.id)">
                            <div style="height: 127px; width: 127px; background: #eee; float: left; position: relative; cursor: pointer;">
                                <img src="{{good.img}}" width="100%" height="100%" />
                                <div style="height: 24px; width: 127px; background: rgba(0,0,0,0.3); position: absolute; bottom:0px; left: 0px; color:#fff; font-size: 12px; line-height: 24px;">￥{{good.pricenow}}<span style="text-decoration: line-through; margin-left:4px;">￥{{good.priceold}}</span></div>
                            </div>
                            <div style="height: 40px; width: 127px; font-size: 13px; line-height: 20px; text-align: center; overflow: hidden;">{{good.name}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"><a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a></div>
        </div>
    </div>
</div>
<!-- choose good end -->

        </div>
    </div>
    <!-- editor template  page start -->
    <script type="text/ng-template" id="edit-topbar.html"><div class="fe-panel-editor-title">页面信息设置<span style="font-size: 12px; margin-left: 10px;"></span></div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">页面标题</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input1" placeholder="页面标题，手机端的页面标题，空则使用系统默认" ng-model="Edit.params.title" />
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">页面描述</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input1" placeholder="页面描述，手机端分享时显示，空则使用系统默认" ng-model="Edit.params.desc" />
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">触发关键字</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input1 keyword" placeholder="触发关键字" ng-model="Edit.params.kw" ng-change="keyword(Edit.params.kw, Edit.id)" />
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">封面图片</div>
    <div class="fe-panel-editor-con">
        <div class="fe-panel-editor-upload" ng-click="pageImg(Edit.id, 'img')" style="height:120px; width: 120px;">
            <img ng-src="{{Edit.params.img}}" width="100%;" height="100%" ng-show="Edit.params.img" />
            <div class="fe-panel-editor-upload-choose2" ng-show="Edit.params.img">重新选择封面图</div>
            <div class="fe-panel-editor-upload-choose1" ng-show="!Edit.params.img" style="line-height:116px;"><i class="fa fa-plus-circle"></i> 选择图片</div>
        </div>
    </div>
</div>
<div class="fe-panel-editor-title">页面功能开关</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">底部导航</div>
    <div class="fe-panel-editor-con">
     
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_footer" value="0" ng-model="Edit.params.footer" /> 不显示</label> 
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_footer" value="1" ng-model="Edit.params.footer" /> 系统默认</label>
        <div ng-if="navs">
            <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_footer" value="2" ng-model="Edit.params.footer" /> 自定义菜单</label>
            <select ng-show="Edit.params.footer==2" name="{{Edit.id}}_footer_menu"  class="fe-panel-editor-input1" ng-model="Edit.params.footermenu" style="width:200px;">
                <?php if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;if($menu['isdefault']): ?>
                        <option value="<?php echo $menu['id']; ?>" selected=""><?php echo $menu['menuname']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;if(empty($menu['isdefault'])): ?>
                        <option value="<?php echo $menu['id']; ?>"><?php echo $menu['menuname']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">悬浮按钮</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_floatico" value="1" ng-model="Edit.params.floatico" /> 显示</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_floatico" value="0" ng-model="Edit.params.floatico" /> 不显示</label>
        <span style="font-size: 12px; margin-left: 10px;">提示:在线客服推荐使用<a href="http://qiao.baidu.com" target="_blank">百度商桥</a>可完美接入</span>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">关注按钮</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_guide" value="1" ng-model="Edit.params.guide" /> 显示</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_guide" value="0" ng-model="Edit.params.guide" /> 不显示</label>
        <span style="font-size: 12px; margin-left: 10px;">提示:仅在未关注时显示</span>
    </div>
</div>
<div class="fe-panel-editor-title" ng-show="Edit.params.floatico == 1">悬浮按钮设置</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.floatico == 1">
    <div class="fe-panel-editor-name">图标位置</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_floatstyle" value="left" ng-model="Edit.params.floatstyle" /> 居左</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_floatstyle" value="right" ng-model="Edit.params.floatstyle" /> 居右</label>
    </div>
</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.floatico == 1">
    <div class="fe-panel-editor-name">图标宽度</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_floatwidth" value="30px" ng-model="Edit.params.floatwidth" /> 30像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_floatwidth" value="40px" ng-model="Edit.params.floatwidth" /> 40像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_floatwidth" value="50px" ng-model="Edit.params.floatwidth" /> 50像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_floatwidth" value="60px" ng-model="Edit.params.floatwidth" /> 60像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_floatwidth" value="80px" ng-model="Edit.params.floatwidth" /> 80像素</label>
        <label style="cursor:pointer; margin-right: 10px;">自定义：<input class="fe-panel-editor-input2" style="line-height: 20px;" value="" ng-model="Edit.params.floatwidth" /></label>
    </div>
</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.floatico == 1">
    <div class="fe-panel-editor-name">顶部间距</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_floattop" value="80px" ng-model="Edit.params.floattop" /> 80像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_floattop" value="100px" ng-model="Edit.params.floattop" /> 100像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_floattop" value="120px" ng-model="Edit.params.floattop" /> 120像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_floattop" value="150px" ng-model="Edit.params.floattop" /> 150像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_floattop" value="180px" ng-model="Edit.params.floattop" /> 180像素</label>
        <label style="cursor:pointer; margin-right: 10px;">自定义：<input class="fe-panel-editor-input2" style="line-height: 20px;" value="" ng-model="Edit.params.floattop" /></label>
    </div>
</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.floatico == 1">
    <div class="fe-panel-editor-name">目标链接</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input1" placeholder="此处只可填写链接，不可填写js代码 (请以http://开头)" ng-model="Edit.params.floathref" />
    </div>
</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.floatico == 1">
    <div class="fe-panel-editor-name">图标图片</div>
    <div class="fe-panel-editor-con">
        <div class="fe-panel-editor-upload" ng-click="pageImg(Edit.id, 'floatimg')" style="min-height:120px; width: 50px;">
            <img ng-src="{{Edit.params.floatimg}}" width="100%;" ng-show="Edit.params.floatimg" />
            <div class="fe-panel-editor-upload-choose2" ng-show="Edit.params.floatimg">重选</div>
            <div class="fe-panel-editor-upload-choose1" ng-show="!Edit.params.floatimg" style="line-height:116px;"><i class="fa fa-plus-circle"></i></div>
        </div>
    </div>
</div>
<div class="fe-panel-editor-title" ng-show="Edit.params.guide == 1">关注按钮设置</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.guide == 1">
    <div class="fe-panel-editor-name">默认标题1</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input1" placeholder="默认标题1，用户访问商城首页或者邀请人不存在的时候显示" ng-model="Edit.params.guidetitle1" />
    </div>
</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.guide == 1">
    <div class="fe-panel-editor-name">默认标题2</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input1" placeholder="默认标题2，用户访问商城首页或者推荐人不存在的时候显示" ng-model="Edit.params.guidetitle2" />
    </div>
</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.guide == 1">
    <div class="fe-panel-editor-name">邀请标题1</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input1" placeholder="邀请标题1，用户被邀请进入商城时显示，可调用变量 [邀请人]、[访问者]" ng-model="Edit.params.guidetitle1s" />
    </div>
</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.guide == 1">
    <div class="fe-panel-editor-name">邀请标题2</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input1" placeholder="邀请标题2，用户被邀请进入商城时显示，可调用变量 [邀请人]、[访问者]" ng-model="Edit.params.guidetitle2s" />
    </div>
</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.guide == 1">
    <div class="fe-panel-editor-name">按钮文字</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input1" placeholder="按钮文字" ng-model="Edit.params.guidesub" />
    </div>
</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.guide == 1">
    <div class="fe-panel-editor-name">标题大小</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_guidesize" value="8px" ng-model="Edit.params.guidesize" /> 8像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_guidesize" value="10px" ng-model="Edit.params.guidesize" /> 10像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_guidesize" value="12px" ng-model="Edit.params.guidesize" /> 12像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_guidesize" value="14px" ng-model="Edit.params.guidesize" /> 14像素</label>
        <label style="cursor:pointer; margin-right: 10px;">自定义：<input class="fe-panel-editor-input2" style="line-height: 20px;" value="" ng-model="Edit.params.guidesize" /></label>
    </div>
</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.guide == 1">
    <div class="fe-panel-editor-name">透明度</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input2" type="text" ng-model="Edit.params.guideopacity">
        <span class="tips">例:0.8 (请填写0-1之间的数字) 建议填写0.9</span>
    </div>
</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.guide == 1">
    <div class="fe-panel-editor-name">标题颜色</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input2" type="color" ng-model="Edit.params.guidecolor">
    </div>
</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.guide == 1">
    <div class="fe-panel-editor-name">背景颜色</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input2" type="color" ng-model="Edit.params.guidebgcolor">
    </div>
</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.guide == 1">
    <div class="fe-panel-editor-name">按钮背景颜色</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input2" type="color" ng-model="Edit.params.guidenavbgcolor">
    </div>
</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.guide == 1">
    <div class="fe-panel-editor-name">按钮文字颜色</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input2" type="color" ng-model="Edit.params.guidenavcolor">
    </div>
</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.guide == 1">
    <div class="fe-panel-editor-name">头像样式</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_guidefacestyle" value="0px" ng-model="Edit.params.guidefacestyle" /> 正方形</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_guidefacestyle" value="40px" ng-model="Edit.params.guidefacestyle" /> 正圆形</label>
    </div>
</div></script>
    <script type="text/ng-template" id="edit-shop.html"><div class="fe-panel-editor-title">店招设置<span class="tips">Tips:商城名称与商城logo读取系统设置</span></div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">选择样式</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_style" value="1" ng-model="Edit.params.style" /> 样式一</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_style" value="2" ng-model="Edit.params.style" /> 样式二</label>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">商城logo</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_logo" value="1" ng-model="Edit.params.logo" /> 显示</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_logo" value="2" ng-model="Edit.params.logo" /> 不显示</label>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">商城名称</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_name" value="1" ng-model="Edit.params.name" /> 显示</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_name" value="2" ng-model="Edit.params.name" /> 不显示</label>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">默认导航</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_menu" value="1" ng-model="Edit.params.menu" /> 显示</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_menu" value="2" ng-model="Edit.params.menu" /> 不显示</label>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">按钮颜色</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input2" type="color" ng-model="Edit.params.navcolor">
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">背景图片</div>
    <div class="fe-panel-editor-con">
        <div class="fe-panel-editor-upload" ng-click="shopImg(Edit.id)">
            <img ng-src="{{Edit.params.bgimg}}" width="100%" ng-show="Edit.params.bgimg" />
            <div class="fe-panel-editor-upload-choose2" ng-show="Edit.params.bgimg">重新选择背景图片</div>
            <div class="fe-panel-editor-upload-choose1" ng-show="!Edit.params.bgimg"><i class="fa fa-plus-circle"></i> 选择图片</div>
        </div>
    </div>
</div></script>
    <script type="text/ng-template" id="edit-notice.html"><div class="fe-panel-editor-title">公告设置<span class="tips">Tips:文字不滚动时超出宽度将隐藏</span></div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">公告内容</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input1" placeholder="这里填写公告内容，可设置是否滚动显示" ng-model="Edit.params.notice" />
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">公告链接</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input1" placeholder="请以http://开头(可链接至公众平台文章等)" ng-model="Edit.params.noticehref" />
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">滚动显示</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_scroll" value="0" ng-model="Edit.params.scroll"> 不滚动</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_scroll" value="1" ng-model="Edit.params.scroll"> 滚动显示</label>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">文字颜色</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input2" type="color" ng-model="Edit.params.color" />
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">背景颜色</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input2" type="color" ng-model="Edit.params.bgcolor" />
    </div>
</div></script>
    <script type="text/ng-template" id="edit-menu.html"><div class="fe-panel-editor-title">按钮组设置<span class="tips">Tips:图片必须是正方形或者正圆形</span></div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">图标样式</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_style" value="0" ng-model="Edit.params.style"> 正方形</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_style" value="100%" ng-model="Edit.params.style"> 圆形</label>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">按钮数量</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_num" value="25%" ng-model="Edit.params.num" ng-change="setimg(Edit.id, Edit.params.num)"> 四个按钮</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_num" value="20%" ng-model="Edit.params.num" ng-change="setimg(Edit.id, Edit.params.num)"> 五个按钮</label>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">背景颜色</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input2" type="color" ng-model="Edit.params.bgcolor" />
    </div>
</div>
<div ng-repeat="menu in Edit.data" ng-hide="$index == 4 && Edit.params.num == '25%'">
    <div class="fe-panel-editor-line2">
        <div class="fe-panel-editor-goodimg" ng-click="uploadImgChild(Edit.id, menu.id)" style="height:120px; width:120px;">
            <img src="{{menu.imgurl}}" width="100%" height="100%" ng-show="menu.imgurl" />
            <div class="fe-panel-editor-goodimg-t1" ng-show="!menu.imgurl" style="line-height:120px;"><i class="fa fa-plus-circle"></i> 选择图片</div>
            <div class="fe-panel-editor-goodimg-t2" ng-show="menu.imgurl" style="width:118px;">重新选择图片</div>
        </div>
        <div class="fe-panel-editor-line2-right">
            <div class="fe-panel-editor-line">
                <div class="fe-panel-editor-name">按钮文字</div>
                <div class="fe-panel-editor-con">
                    <input class="fe-panel-editor-input1" style="width:400px;" value="" ng-model="menu.text" placeholder="请填写按钮文字" />
                </div>
            </div>
            <div class="fe-panel-editor-line">
                <div class="fe-panel-editor-name">链接地址</div>
                <div class="fe-panel-editor-con">
                    <input class="fe-panel-editor-input3"  value="" ng-model="menu.hrefurl" placeholder="请手动输入链接(请以http://开头)或选择系统链接" />
                    <div class="fe-panel-editor-input4" ng-click="chooseUrl(Edit.id, menu.id)">系统连接</div>
                </div>
            </div>
            <div class="fe-panel-editor-line">
                <div class="fe-panel-editor-name">文字颜色</div>
                <div class="fe-panel-editor-con">
                    <input class="fe-panel-editor-input2" type="color" ng-model="menu.color" />
                </div>
            </div>
        </div>
    </div>
</div></script>
    <script type="text/ng-template" id="edit-banner.html"><div class="fe-panel-editor-title">轮播设置<span class="tips">Tips:轮播图片的大小必须一样哦~</span></div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">按钮形状</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_style" value="" ng-model="Edit.params.shape"> 长方形</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_style" value="shape2" ng-model="Edit.params.shape"> 正方形</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_style" value="shape3" ng-model="Edit.params.shape"> 圆形</label>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">按钮位置</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_align" value="left" ng-model="Edit.params.align"> 按钮居左</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_align" value="center" ng-model="Edit.params.align"> 按钮居中</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_align" value="right" ng-model="Edit.params.align"> 按钮居右</label>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">按钮颜色</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input2" type="color" ng-model="Edit.params.bgcolor" />
    </div>
</div>
<div ng-repeat="banner in Edit.data" class="fe-panel-editor-relative">
    <div class="fe-panel-editor-del" title="移除" ng-click="delItemChild(Edit.id, banner.id)">×</div>
    <div class="fe-panel-editor-line2">
        <div class="fe-panel-editor-goodimg" ng-click="uploadImgChild(Edit.id, banner.id)">
            <img ng-src="{{banner.imgurl}}" width="100%" ng-show="banner.imgurl" />
            <div class="fe-panel-editor-goodimg-t1" ng-show="!banner.imgurl"><i class="fa fa-plus-circle"></i> 选择图片</div>
            <div class="fe-panel-editor-goodimg-t2" ng-show="banner.imgurl">重新选择图片</div>
        </div>
        <div class="fe-panel-editor-line2-right">
            <div class="fe-panel-editor-line">
                <div class="fe-panel-editor-name">选择链接</div>
                <div class="fe-panel-editor-con">
                    <input class="fe-panel-editor-input3"  value="" ng-model="banner.hrefurl" placeholder="请手动输入链接(请以http://开头)或选择系统链接" />
                    <div class="fe-panel-editor-input4" ng-click="chooseUrl(Edit.id, banner.id)">系统连接</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fe-panel-editor-sub1" ng-click="addItemChild('banner', Edit.id)"><i class="fa fa-plus-circle"></i> 添加一个轮播</div></script>
    <script type="text/ng-template" id="edit-picture.html"><div class="fe-panel-editor-title">单图设置<span class="tips">Tips:图片最低高度为40像素</span></div>
<div ng-repeat="picture in Edit.data" class="fe-panel-editor-relative">
    <div class="fe-panel-editor-del" title="移除" ng-click="delItemChild(Edit.id, picture.id)">×</div>
    <div class="fe-panel-editor-line2">
        <div class="fe-panel-editor-goodimg" ng-click="uploadImgChild(Edit.id, picture.id)">
            <img ng-src="{{picture.imgurl}}" width="100%" ng-show="picture.imgurl" />
            <div class="fe-panel-editor-goodimg-t1" ng-show="!picture.imgurl"><i class="fa fa-plus-circle"></i> 选择图片</div>
            <div class="fe-panel-editor-goodimg-t2" ng-show="picture.imgurl">重新选择图片</div>
        </div>
        <div class="fe-panel-editor-line2-right">
            <div class="fe-panel-editor-line">
                <div class="fe-panel-editor-name">链接地址</div>
                <div class="fe-panel-editor-con">
                    <input class="fe-panel-editor-input3"  value="" ng-model="picture.hrefurl" placeholder="请手动输入链接(请以http://开头)或选择系统链接" />
                    <div class="fe-panel-editor-input4" ng-click="chooseUrl(Edit.id, picture.id)">系统连接</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fe-panel-editor-sub1" ng-click="addItemChild('picture', Edit.id)"><i class="fa fa-plus-circle"></i> 添加一个单图</div></script>
    <script type="text/ng-template" id="edit-title.html"><div class="fe-panel-editor-title">标题设置</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">主标题内容</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input1" placeholder="标题模块的主标题，超出屏幕宽度将自动隐藏" ng-model="Edit.params.title1" />
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">主标题大小</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_fontsize1" value="12px" ng-model="Edit.params.fontsize1" /> 12像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_fontsize1" value="14px" ng-model="Edit.params.fontsize1" /> 14像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_fontsize1" value="16px" ng-model="Edit.params.fontsize1" /> 16像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_fontsize1" value="18px" ng-model="Edit.params.fontsize1" /> 18像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_fontsize1" value="20px" ng-model="Edit.params.fontsize1" /> 20像素</label>
        <label style="cursor:pointer; margin-right: 10px;">自定义：<input class="fe-panel-editor-input2" style="line-height: 20px;" value="" ng-model="Edit.params.fontsize1" /></label>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">显示副标题</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_showtitle2" value="1" ng-model="Edit.params.showtitle2" /> 显示</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_showtitle2" value="0" ng-model="Edit.params.showtitle2" /> 不显示</label>
    </div>
</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.showtitle2 == 1">
    <div class="fe-panel-editor-name">副标题内容</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input1" placeholder="标题模块的副标题，超出屏幕宽度将自动隐藏" ng-model="Edit.params.title2" />
    </div>
</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.showtitle2 == 1">
    <div class="fe-panel-editor-name">副标题大小</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_fontsize2" value="12px" ng-model="Edit.params.fontsize2" /> 12像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_fontsize2" value="14px" ng-model="Edit.params.fontsize2" /> 14像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_fontsize2" value="16px" ng-model="Edit.params.fontsize2" /> 16像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_fontsize2" value="18px" ng-model="Edit.params.fontsize2" /> 18像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_fontsize2" value="20px" ng-model="Edit.params.fontsize2" /> 20像素</label>
        <label style="cursor:pointer; margin-right: 10px;">自定义：<input class="fe-panel-editor-input2" style="line-height: 20px;" value="" ng-model="Edit.params.fontsize2" /></label>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">对齐方向</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_align" value="left" ng-model="Edit.params.align" /> 居左</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_align" value="center" ng-model="Edit.params.align" /> 居中</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_align" value="right" ng-model="Edit.params.align" /> 居右</label>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">文字颜色</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input2" type="color" ng-model="Edit.params.color" />
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">背景颜色</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input2" type="color"  ng-model="Edit.params.bgcolor" />
    </div>
</div></script>
    <script type="text/ng-template" id="edit-search.html"><div class="fe-panel-editor-title">搜索框设置</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">提示文字</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input1" placeholder="搜索框默认提示文字，超出屏幕宽度将自动隐藏" ng-model="Edit.params.placeholder" />
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">选择样式</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_style" value="style1" ng-model="Edit.params.style"> 样式一</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_style" value="style2" ng-model="Edit.params.style"> 样式二</label>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">文字颜色</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input2" type="color" ng-model="Edit.params.color" />
        <span class="tips">提示: 输入文字颜色</span>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">边框颜色</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input2" type="color" ng-model="Edit.params.bordercolor" />
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">背景颜色</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input2" type="color" ng-model="Edit.params.bgcolor" />
    </div>
</div></script>
    <script type="text/ng-template" id="edit-line.html"><div class="fe-panel-editor-title">辅助线设置</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">选择样式</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_style" value="solid" ng-model="Edit.params.style" /> 实线</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_style" value="dashed" ng-model="Edit.params.style" /> 虚线</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_style" value="dotted" ng-model="Edit.params.style" /> 圆点</label>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">选择高度</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_height" value="1px" ng-model="Edit.params.height" /> 1像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_height" value="2px" ng-model="Edit.params.height" /> 2像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_height" value="5px" ng-model="Edit.params.height" /> 5像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_height" value="10px" ng-model="Edit.params.height" /> 10像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{edit.id}}_height" value="20px" ng-model="Edit.params.height" /> 20像素</label>
        <label style="cursor:pointer; margin-right: 10px;">自定义：<input class="fe-panel-editor-input2" style="line-height: 20px;" value="" ng-model="Edit.params.height" /></label>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">设置颜色</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input2" type="color" ng-model="Edit.params.color">
    </div>
</div></script>
    <script type="text/ng-template" id="edit-blank.html"><div class="fe-panel-editor-title">辅助空白设置</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">选择高度</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_height" value="10px" ng-model="Edit.params.height" /> 10像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_height" value="20px" ng-model="Edit.params.height" /> 20像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_height" value="50px" ng-model="Edit.params.height" /> 50像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_height" value="100px" ng-model="Edit.params.height" /> 100像素</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_height" value="150px" ng-model="Edit.params.height" /> 150像素</label>
        <label style="cursor:pointer; margin-right: 10px;">自定义：<input class="fe-panel-editor-input2" style="line-height: 20px;" ng-model="Edit.params.height" /></label>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">背景颜色</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input2" type="color" ng-model="Edit.params.bgcolor" />
    </div>
</div></script>
    <script type="text/ng-template" id="edit-goods.html"><div class="fe-panel-editor-title">商品设置<span class="tips">提示: 商品组的图标可通过替换目录文件自定义</span></div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">样式选择</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_style" value="100%" ng-model="Edit.params.style" ng-change="changeImg(Edit.id, Edit.params.style)" /> 单排显示</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_style" value="49.5%" ng-model="Edit.params.style" ng-change="changeImg(Edit.id, Edit.params.style)" /> 双排显示</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_style" value="33.3%" ng-model="Edit.params.style" ng-change="changeImg(Edit.id, Edit.params.style)" /> 三排显示</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_style" value="hp" ng-model="Edit.params.style" ng-change="changeImg(Edit.id, Edit.params.style)" /> 横排显示</label>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">显示标题</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_showtitle" value="0" ng-model="Edit.params.showtitle" /> 显示</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_showtitle" value="1" ng-model="Edit.params.showtitle" /> 不显示</label>
    </div>
</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.showtitle == 0">
    <div class="fe-panel-editor-name">分组标题</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input1" placeholder="搜索框默认提示文字，超出屏幕宽度将自动隐藏" ng-model="Edit.params.title" />
    </div>
</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.showtitle == 0">
    <div class="fe-panel-editor-name">标题颜色</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input2" type="color" ng-model="Edit.params.titlecolor">
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">背景颜色</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input2" type="color" ng-model="Edit.params.bgcolor">
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">商品属性</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_option" value="" ng-model="Edit.params.option" /> 无</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_option" value="sale-tj" ng-model="Edit.params.option" /> 推荐</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_option" value="sale-rx" ng-model="Edit.params.option" /> 热销</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_option" value="sale-xp" ng-model="Edit.params.option" /> 新上</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_option" value="sale-by" ng-model="Edit.params.option" /> 包邮</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_option" value="sale-xs" ng-model="Edit.params.option" /> 限时</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_option" value="sale-cx" ng-model="Edit.params.option" /> 促销</label>
    </div>
</div>
<div class="fe-panel-editor-line" ng-show="Edit.params.showname == 1">
    <div class="fe-panel-editor-name">购买按钮</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_buysub" value="" ng-model="Edit.params.buysub" /> 不显示</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_buysub" value="buy-1" ng-model="Edit.params.buysub" /> 样式一</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_buysub" value="buy-2" ng-model="Edit.params.buysub" /> 样式二</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_buysub" value="buy-3" ng-model="Edit.params.buysub" /> 样式三</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_buysub" value="buy-4" ng-model="Edit.params.buysub" /> 样式四</label>
    </div>
</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">商品价格</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_price" value="0" ng-model="Edit.params.price" /> 不显示</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_price" value="1" ng-model="Edit.params.price" /> 原价+现价</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_price" value="2" ng-model="Edit.params.price" /> 只显示现价</label>
    </div>
</div>
<div class="fe-panel-editor-line" ng-hide="Edit.params.style=='hp'">
    <div class="fe-panel-editor-name">商品名称</div>
    <div class="fe-panel-editor-con">
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_showname" value="0" ng-model="Edit.params.showname" /> 不显示</label>
        <label style="cursor:pointer; margin-right: 10px;"><input type="radio" name="{{Edit.id}}_showname" value="1" ng-model="Edit.params.showname" /> 显示</label>
        <span>Tips:隐藏商品名称将默认隐藏购买按钮</span>
    </div>
</div>
<div ng-repeat="good in Edit.data" class="fe-panel-editor-relative">
    <div class="fe-panel-editor-line2">
        <div class="fe-panel-editor-del" title="移除" ng-click="delGood(Edit.id, good.id)">×</div>
        <div class="fe-panel-editor-goodimg" style="height:120px; width: 120px; position: relative;" ng-click="addGood('replace', Edit.id, good.id)">
            <img ng-src="{{good.img}}" width="100%" height="100%" />
            <div style="height:24px; width:100%; color:#fff; line-height:24px; font-size:14px; background:rgba(0,0,0,0.4); text-align:center; left:0px; bottom:0px; position: absolute;">重新选择商品</div>
        </div>
        <div class="fe-panel-editor-line2-right">
            <div class="fe-panel-editor-line">
                <div class="fe-panel-editor-name">商品名称</div>
                <div class="fe-panel-editor-con">{{good.name}}</div>
            </div>
            <div class="fe-panel-editor-line">
                <div class="fe-panel-editor-name">商品价格</div>
                <div class="fe-panel-editor-con"><span style="font-size: 16px;">￥{{good.pricenow}}</span> <span style="text-decoration: line-through;">￥{{good.priceold}}</span></div>
            </div>
        </div>
    </div>
</div>
<div class="fe-panel-editor-sub1" ng-click="addGood('', Edit.id, '')"><i class="fa fa-plus-circle"></i> 添加一个商品</div></script>
    <script type="text/ng-template" id="edit-richtext.html"><div class="fe-panel-editor-title">富文本设置</div>
<div class="fe-panel-editor-line">
    <div class="fe-panel-editor-name">背景颜色</div>
    <div class="fe-panel-editor-con">
        <input class="fe-panel-editor-input2" type="color" ng-model="Edit.params.bgcolor">
    </div>
</div>
<div class="ueditor" ng-model="Edit.content" style="height:400px; width:100%; margin-top:10px;"></div></script>
    <script type="text/ng-template" id="edit-cube.html"><div class="fe-panel-editor-cube">
    <div class="fe-panel-editor-title">魔方设置</div> 
    <div class="fe-panel-editor-line">
        <div class="fe-panel-editor-name">背景颜色</div>
        <div class="fe-panel-editor-con">
            <input class="fe-panel-editor-input2" type="color" ng-model="Edit.params.bgcolor" />
        </div>
    </div>
    <div class="fe-panel-editor-line">
        <div class="fe-panel-editor-name">布局</div>
        <div class="fe-panel-editor-con">
            <table id="cube-editor" style ="margin-top:10px">
                <tr ng-repeat="(x, row) in Edit.params.layout ">
                    <td ng-repeat="(y, col) in row" class="{{col.classname}} rows-{{col.rows}} cols-{{col.cols}}" ng-click="col['isempty'] ? showSelection(Edit, x, y) : changeItem(Edit, x, y)" ng-class="{'empty' : col.isempty, 'not-empty' : !col.isempty}" rowspan="{{col.rows}}" colspan="{{col.cols}}"  x="{{x}}" y="{{y}}">
                        <div ng-if="col.isempty">+</div>
                        <div ng-if="!col.imgurl && !col.isempty">{{col.cols * 160}} * {{col.rows * 160}}</div>
                        <div ng-if="!col.isempty && col.imgurl"><img ng-src="{{col.imgurl}}" width="{{col.cols * 85}}" height="{{col.rows * 85}}" /></div>
                    </td>
                </tr>
            </table>
            <span class="help-block">点击"+",添加内容</span><img ng-src="{{col.imgurl}}" width="{{col.cols * 60}}" height="{{col.cols * 60}}" />
        </div>
    </div>
    <div class="fe-panel-editor-line2" ng-show="Edit.params.currentLayout.isempty == false" style="position: relative;">
        <div class="fe-panel-editor-del" title="移除" ng-click="delCube(Edit,Edit.params.currentLayout.classname,Edit.params.currentLayout.cols,Edit.params.currentLayout.rows)" style="top: 0; right: 0; border-radius: 0 0 0 20px; padding-left: 5px; padding-bottom: 5px;">×</div>
        <div ng-click="uploadImgChild(Edit.id, Edit.params.currentLayout.classname,'cube')" class="fe-panel-editor-goodimg" style="min-height: 100px; width: 100px;">
            <img width="100%" ng-show="Edit.params.currentLayout.imgurl" ng-src="{{Edit.params.currentLayout.imgurl}}">
            <div ng-show="!Edit.params.currentLayout.imgurl" class="fe-panel-editor-goodimg-t1 ng-hide" style="line-height: 100px;"><i class="fa fa-plus-circle"></i> 选择图片</div>
            <div ng-show="Edit.params.currentLayout.imgurl" class="fe-panel-editor-goodimg-t2" style="width: 100%; height: 20px; line-height: 20px;">重新选择图片</div>
        </div>
        <div class="fe-panel-editor-line2-right">
            <div class="fe-panel-editor-line">
                <div class="fe-panel-editor-name">图片尺寸:</div>
                <div class="fe-panel-editor-con">{{Edit.params.currentLayout.cols * 160}} * {{Edit.params.currentLayout.rows * 160}} 像素</div>
            </div>
            <div class="fe-panel-editor-line">
                <div class="fe-panel-editor-name">链接地址</div>
                <div class="fe-panel-editor-con">
                    <input placeholder="请手动输入链接(请以http://开头)或选择系统链接" ng-model="Edit.params.currentLayout.url" value="" class="fe-panel-editor-input3 ng-pristine ng-untouched ng-valid">
                    <div ng-click="chooseUrl(Edit.id, Edit.params.currentLayout.classname,'cube')" class="fe-panel-editor-input4">系统连接</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="{{Edit.id}}-modal-cube-layout" class="modal fade in" role="dialog" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3>选择布局</h3>
            </div>
            <div class="modal-body text-center">
                <div class="layout-table">
                    <ul class="layout-cols layout-rows-{{col.rows}} clearfix" ng-repeat="row in Edit.params.selection">
                        <li data-cols="{{col.cols}}" data-rows="{{col.rows}}" ng-click="selectLayout(Edit, Edit.params.currentPos.row, Edit.params.currentPos.col, col.rows, col.cols)" ng-repeat="col in row"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> 
</div></script>
    <!-- editor template page end -->
</div>
</body>
</html>
<script type="text/javascript" src="__PUBLIC__/designer/angular.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/designer/angular-ueditor.js"></script>
<script type="text/javascript" src="__PUBLIC__/designer/hhSwipe.js"></script>
<script type="text/javascript" src="__PUBLIC__/designer/Ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="__PUBLIC__/designer/Ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/designer/Ueditor/ueditor.parse.js"></script>
<script type="text/javascript" src="__PUBLIC__/designer/Ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
    // 百度编辑器初始化
    var opts = {type: 'image',direct: false,multi: true,tabs: {'upload': 'active','browser': '','crawler': ''},path: '',dest_dir: '',global: false,thumb: false,width: 0};
    UE.registerUI('myinsertimage',function(editor, uiName) {
                editor.registerCommand(uiName, {
                    execCommand: function() {
                        require(['fileUploader'],
                                function(uploader) {
                                    uploader.show(function(imgs) {
                                                if (imgs.length == 0) {
                                                    return;
                                                } else if (imgs.length == 1) {
                                                    editor.execCommand('insertimage', {
                                                        'src': imgs[0]['url'],
                                                        '_src': imgs[0]['attachment'],
                                                        'width': '100%',
                                                        'alt': imgs[0].filename
                                                    });
                                                } else {
                                                    var imglist = [];
                                                    for (i in imgs) {
                                                        imglist.push({
                                                            'src': imgs[i]['url'],
                                                            '_src': imgs[i]['attachment'],
                                                            'width': '100%',
                                                            'alt': imgs[i].filename
                                                        });
                                                    }
                                                    editor.execCommand('insertimage', imglist);
                                                }
                                            },
                                            opts);
                                });
                    }
                });
                var btn = new UE.ui.Button({
                    name: '插入图片',
                    title: '插入图片',
                    cssRules: 'background-position: -726px -77px',
                    onclick: function() {
                        editor.execCommand(uiName);
                    }
                });
                editor.addListener('selectionchange',
                        function() {
                            var state = editor.queryCommandState(uiName);
                            if (state == -1) {
                                btn.setDisabled(true);
                                btn.setChecked(false);
                            } else {
                                btn.setDisabled(false);
                                btn.setChecked(state);
                            }
                        });
                return btn;
            },
            19);
</script>

<script>
    $(function(){
        require(['util'], function (util) {
            var preview_id = util.cookie.get('preview_id');
            if(preview_id){
                preview(preview_id);
            }
        });

        $(".fe-save-info-type-ok").click(function(){
            var pagetype = $(this).data("type");
            if(pagetype!='2' || pagetype!='3'){
                $(this).find(".fe-save-main-radio").addClass("fe-save-main-radio2").text("√");
                $(this).siblings().find(".fe-save-main-radio").removeClass("fe-save-main-radio2").text("");
            }
            $("input[name=pagetype]").val(pagetype);
        });
    });

    function switchtab(tag,n){
        $("#"+tag+"-"+n).fadeIn().siblings().hide();
        $("#"+tag+"-nav-"+n).addClass("active").siblings().removeClass("active");
    }

    function fold(){
        width= $(".fe-save").width();
        left = $(".fe-save").css("left");
        left = left.replace("px","");
        if(left>=0){
            $(".fe-save").animate({left:0-width+40+"px"},1000);
            $(".fe-save-fold").addClass("fe-save-fold2");
        }else{
            $(".fe-save").animate({left:"0px"},1000);
            $(".fe-save-fold").removeClass("fe-save-fold2");
        }
    }

    function preview(pageid){
        var url = "{php echo $this->createPluginMobileUrl('designer')}&preview=1&pageid="+pageid;
        $('#modal-module-menus3').find("iframe").attr("src",url);
        popwin = $('#modal-module-menus3').modal();
        require(['util'], function (util) {
            util.cookie.set('preview_id','');
        });
    }

    function setcookie(id){
        require(['util'], function (util) {
            util.cookie.set('preview_id',id);
        });
    }

    function clone(myObj){
        if(typeof(myObj) != 'object' || myObj == null) return myObj;
        var newObj = new Object();
        for(var i in myObj){
            newObj[i] = clone(myObj[i]);
        }
        return newObj;
    }
    function cloneArr(arr){
        var newArr = [];
        $(arr).each(function(i,val){
            newArr.push(clone(val));
        });
        return newArr;
    }

    function initswipe(jobj){
        var bullets = jobj.next().get(0).getElementsByTagName('a');
        var banner = Swipe(jobj.get(0), {
            auto: 2000,
            continuous: true,
            disableScroll:false,
            callback: function(pos) {
                var i = bullets.length;
                while (i--) {
                    bullets[i].className = '';
                }
                bullets[pos].className = 'cur';
            }
        })
    }

    var myModel = angular.module('FoxEditor',['ng.ueditor']);
    myModel.controller('FoxController', ['$scope', function($scope){
        $scope.navs = [
            {id:'notice',name:'公告',params:{color:'',bgcolor:'',notice:'',noticehref:'',scroll:'0'}},
            {id:'banner',name:'轮播',params:{shape:'',align:'center',scroll:'2',bgcolor:''},
                data:[
                    {id:'B0000000000001',imgurl:'http://www.weiketp5.net__PUBLIC__/designer/init-data/init-image-3.jpg',hrefurl:'http://www.baidu.com',sysurl:'url',},
                    {id:'B0000000000002',imgurl:'http://www.weiketp5.net__PUBLIC__/designer/init-data/init-image-2.jpg',hrefurl:'http://www.qq.com',sysurl:'url'},
                    {id:'B0000000000003',imgurl:'http://www.weiketp5.net__PUBLIC__/designer/init-data/init-image-6.jpg',hrefurl:'http://www.sina.com',sysurl:'url'}
                ]
            },
            {id:'title',name:'标题',params:{title1:'',title2:'',showtitle2:'1',fontsize1:'18px',fontsize2:'14px',align:'left',color:'#000',}},
            {id:'search',name:'搜索框',params:{placeholder:'搜索：输入关键字在店内搜索',style:'style1','color':'','bgcolor':'','bordercolor':'',searchurl:'',uniacid:'2'}},
            {id:'line',name:'辅助线',params:{height:'2px',style:'dashed',color:'#000'}},
            {id:'blank',name:'辅助空白',params:{height:'100px',bgcolor:''}},
            {id:'shop',name:'店招',params:{style:'1',bgimg:'"__PUBLIC__/designer/init-data/init-image-1.jpg',logo:'1',name:'1',menu:'1',navcolor:''},
                data:['http://www.baidu.com','http://www.baidu.com','http://www.baidu.com','http://www.baidu.com']
            },
            {id:'goods',name:'商品组',params:{style:'50%',showtitle:'0',titlecolor:'',bgcolor:'',showname:'1',title:'',option:'sale-rx',buysub:'buy-3',price:'1',goodhref:'http://www.baidu.com'},data:[]},
            {id:'richtext',name:'富文本',params:{bgcolor:'',},content:''},
            {id:'menu',name:'按钮组',params:{num:'20%',style:'0',bgcolor:'#fff',},
                data:[{id:'F0000000000001',imgurl:'',text:'',hrefurl:'',color:''},{id:'F0000000000002',imgurl:'',text:'',hrefurl:'',color:''},{id:'F0000000000003',imgurl:'',text:'',hrefurl:'',color:''},{id:'F0000000000004',imgurl:'',text:'',hrefurl:'',color:''},{id:'F0000000000005',imgurl:'',text:'',hrefurl:'',color:''}]
            },
            {id:'picture',name:'单图',params:{},data:[{id:'P0000000000001',imgurl:'"__PUBLIC__/designer/init-data/init-image-4.jpg',hrefurl:'',option:'0'}]},
            {id: "cube",name: "图片魔方",params: {bgcolor:'',layout: {},showIndex: 0,selection: {},currentPos: {},currentLayout: {isempty: !0}},data:[]}
        ];
        $scope.shop = {uniacid:'2'};//店铺id
        $scope.system = [<?php echo $system; ?>];//系统
        $scope.pages = [<?php echo $pageinfo; ?>];//页面导航
        $scope.Items = [<?php echo $data; ?>];//页面数据

        $scope.underscore = null;
        require(['underscore'],function(underscore){
            $scope.underscore = underscore;
        });
        $scope.hasCube = function(Item){
            var has = false;
            var row=0,col = 0;
            for(var i=row;i<4;i++){
                for(var j=col;j<4;j++){
                    if (!$scope.underscore.isUndefined(Item.params.layout[i][j]) && !Item.params.layout[i][j].isempty) {
                        has = true;
                        break;
                    }
                }
            }
            return has;
        }

        $scope.showSelection = function(Edit, row,col){

            Edit.params.currentPos = {row: row,col: col};
            Edit.params.selection = {};
            var maxrow = 4,maxcol = 4,end =false;

            for(var i=row;i<=3;i++){

                if ($scope.underscore.isUndefined(Edit.params.layout[i][col]) || !$scope.underscore.isUndefined(Edit.params.layout[i][col]) && !Edit.params.layout[i][col].isempty) {
                    maxrow = i;
                    end =true;
                }
                if(end){
                    break;
                }
            }

            end =false;
            for(var j=col;j<=3;j++){
                if ( $scope.underscore.isUndefined(Edit.params.layout[row][j]) || !$scope.underscore.isUndefined(Edit.params.layout[row][j]) && !Edit.params.layout[row][j].isempty) {
                    maxcol = j;
                    end =true;
                }
                if(end){
                    break;
                }
            }

            var f = -1,g = 1;

            for (var i = row; i < maxrow; i++) {

                var y = 1;
                Edit.params.selection[g] = {};
                for (var j = col; j < maxcol; j++) {
                    if( f >= 0 && f < j || (!$scope.underscore.isUndefined(Edit.params.layout[i][j]) && Edit.params.layout[i][j].isempty   )){
                        Edit.params.selection[g][y] = {
                            rows: g,
                            cols: y
                        };
                        y++;
                    }
                    else{
                        f = j - 1
                    }
                }
                g++;
            }

            $(".layout-table li").removeClass("selected");
            $scope.modalobj = $("#"+Edit.id+"-modal-cube-layout").modal({show:true});
            $('#'+Edit.id+'-modal-cube-layout').find(".layout-table").unbind('mouseover').mouseover(function(a) {
                if ("LI" == a.target.tagName) {
                    $(".layout-table li").removeClass("selected");
                    var c = $(a.target).attr("data-rows"),
                            d = $(a.target).attr("data-cols");
                    $(".layout-table li").filter(function(a, e) {
                        return $(e).attr("data-rows") <= c && $(e).attr("data-cols") <= d
                    }).addClass("selected")
                }
            });

            return true;
        }
        $scope.selectLayout = function(Edit, currentRow, currentCol, rows, cols) {
            if( $scope.underscore.isUndefined(rows) ) {rows= 0;}
            if( $scope.underscore.isUndefined(cols) ) {cols = 0;}
            Edit.params.layout[currentRow][currentCol] = {
                cols: cols,
                rows: rows,
                isempty: false,
                imgurl: "",
                classname: "index-" + Edit.params.showIndex
            };
            for (var i = parseInt(currentRow); i < parseInt(currentRow) + parseInt(rows); i++){
                for (var j = parseInt(currentCol); j < parseInt(currentCol) + parseInt(cols); j++) {
                    if( currentRow != i || currentCol != j)  {
                        delete Edit.params.layout[i][j];
                    }
                }
            }
            Edit.params.showIndex++;
            $scope.modalobj.modal('hide');
            $scope.changeItem(Edit, currentRow,currentCol);
            return true;
        }
        $scope.changeItem = function(Edit,row,col){
            $("#cube-editor td").removeClass("current").filter(function(a, e) {
                return $(e).attr("x") == row && $(e).attr("y") == col
            }).addClass("current");
            $("#cube_thumb").attr("src", "");
            Edit.params.currentLayout = Edit.params.layout[row][col];
        }
        $scope.delCube = function(Edit,Cid,cols,rows){
            if(Edit && Cid && cols && rows){
                var len = Edit.params.layout.length;
                $.each(Edit.params.layout,function(row,a){
                    $.each(Edit.params.layout[row],function(col,b){
                        if(col!='$$hashKey'){
                            if(b.classname==Edit.params.currentLayout.classname){
                                row  =parseInt(row);col = parseInt(col);
                                rows  =parseInt(rows);cols = parseInt(cols);
                                for(var i = row;i<row+rows;i++){
                                    for(var j=col;j<col+cols;j++){
                                        Edit.params.layout[i][j] = {cols: 1,rows: 1,isempty: true,imgurl: "",classname: ""};
                                    }
                                }
                            }
                        }
                    });

                });
            }
        }


        // 1.1 添加一条子级(good,picture,banner)
        $scope.addItemChild =function(type,Mid){
            if(type && Mid){
                t = '';
                if(type=='good'){t = 'G';}
                else if(type=='picture'){t = 'P';}
                else if(type=='banner'){t = 'B';}
                var var_id = t+new Date().getTime();
                var push = {
                    banner:{id:var_id,imgurl:'',hrefurl:'',sysurl:'url'},
                    picture:{id:var_id,imgurl:'',hrefurl:'',option:'0'},
                    good:{}
                };
                var Items = $scope.Items;
                angular.forEach(Items, function(m,index) {
                    if(m.id==Mid){
                        m.data.push(push[type]);
                        //console.log(push[type]);
                    }
                });
            }
        }

        // 1.1 删除一条子级
        $scope.delItemChild = function(Mid,Cid){
            if(confirm("此操作不可逆，确认移除？")){
                var Items = $scope.Items;
                angular.forEach(Items, function(m,index1) {
                    if(m.id==Mid){
                        angular.forEach(m.data, function(c,index2) {
                            if(c.id==Cid){
                                m.data.splice(index2,1);
                            }
                        });
                    }
                });
            }
        }

        // 1.1 上传图片
        $scope.uploadImgChild = function(Mid,Cid,Type){
            require(['jquery', 'util'], function($, util){
                util.image('',function(data){
                    var Items = $scope.Items;
                    angular.forEach(Items, function(m,index1) {
                        if(m.id==Mid){
                            if(Type=='cube'){
                                m.params.currentLayout.imgurl = data['url'];
                                $("div[mid="+Mid+"]").mouseover();

                            }else{
                                angular.forEach(m.data, function(c,index2) {
                                    if(c.id==Cid){
                                        c.imgurl = data['url'];
                                        $("div[mid="+Mid+"]").mouseover();
                                        //console.log(Items);
                                    }
                                });
                            }
                        }
                    });
                });
            });
        }

        $scope.chooseUrlCube = function(Mid,Cid){
            var Items = $scope.Items;
            angular.forEach(Items, function(m) {
                if(m.id==Mid){
                    m.params.currentLayout.url = 'http://www.qq.com';
                    $("div[mid="+Mid+"]").mouseover();
                }
            });
        }
        // 1.1 选择链接
        $scope.chooseUrl = function(Mid,Cid,T){
            $('#floating-link').attr({"Mid":Mid,"Cid":Cid,T:T});
            $('#floating-link').modal();
        }
        $scope.chooseLink = function(type,hid){
            var Mid = $('#floating-link').attr("Mid");
            var Cid =  $('#floating-link').attr("Cid");
            var T =  $('#floating-link').attr("T");
            var url = $("#fe-tab-link-"+type+" #fe-tab-link-li-"+hid).data("href");
            if(url && Mid && Cid){
                angular.forEach($scope.Items, function(m,index1) {
                    if(m.id==Mid){
                        if(T=='cube'){
                            m.params.currentLayout.url = url;
                            $("div[mid="+Mid+"]").mouseover();
                        }else{
                            angular.forEach(m.data, function(c,index2) {
                                if(c.id==Cid){
                                    c.hrefurl = url;
                                }
                            });
                        }
                    }
                });
                $('#floating-link').attr({"Mid":'',"Cid":'',T:''});
                $('#floating-link .close').click();
            }
        }
        $scope.temp = {
            notcie:[]
        };
        $scope.ajaxselect =function(type){
            val = $("#select-"+type+"-kw").val();
            mid = $("#floating-link").attr("mid");
            $.ajax({
                type: 'post',
                dataType:'json',
                url: "{php echo $this->createPluginWebUrl('designer',array('op'=>'api','apido'=>'selectlink'))}",
                data: {kw:val,type:type},
                success: function(data){
                    $scope.temp[type]=data;
                    $("div [mid="+mid+"]").mouseover();
                },
                error: function(){
                    alert('查询失败！请刷新页面。');
                }
            });
        }

        $scope.focus = 'M0000000000000';

        $scope.keyword = function(val,Eid){
            $.ajax({
                type: 'post',
                url: "{php echo $this->createPluginWebUrl('designer',array('op'=>'api','apido'=>'selectkeyword'))}",
                data: {kw:val,pid:"<?php echo $pageid; ?>"},
                success: function(data){
                    if(data != 'ok'){
                        window.dosave = '1';
                        $("div[Editid="+Eid+"]").find(".keyword").css('border',"#f01 solid 1px");
                    }else{
                        window.dosave = '0';
                        $("div[Editid="+Eid+"]").find(".keyword").css('border',"#ddd solid 1px");
                    }
                },
                error: function(){
                    alert('查询商品信息失败！请刷新页面。');
                }
            });
        }

        $scope.selectgood = function(Mid){
            kw = $("#secect-kw").val();
            $.ajax({
                type: 'post',
                dataType:'json',
                url: "{php echo $this->createPluginWebUrl('designer',array('op'=>'api','apido'=>'selectgood'))}",
                data: {kw:kw},
                success: function(data){
                    $scope.selectGoods = [];
                    angular.forEach(data, function(d,i) {
                        Sid = 'S'+new Date().getTime();
                        $scope.selectGoods.push({id:Sid+i,name:data[i].title,img:data[i].thumb,goodid:data[i].id,pricenow:data[i].marketprice,priceold:data[i].productprice,sales:data[i].sales,unit:data[i].unit});
                    });
                    $("div[mid="+Mid+"]").mouseover();
                },
                error: function(){
                    alert('查询商品信息失败！请刷新页面。');
                }
            });
        }

        $scope.pushGood = function(Mid,Sid){
            var repaction =  $('#floating-good').attr("action");
            var repGid =  $('#floating-good').attr("Gid");
            angular.forEach($scope.Items, function(m,index1) {
                if(m.id==Mid){
                    angular.forEach($scope.selectGoods, function(s,index2) {
                        if(s.id==Sid){
                            if(repaction=='replace' && repGid){
                                // 执行替换
                                angular.forEach(m.data, function(r,index3) {
                                    if(r.id==repGid){
                                        var Gid = 'G'+new Date().getTime();
                                        r.id = Gid;
                                        r.img = s.img;
                                        r.goodid = s.goodid;
                                        r.name = s.name;
                                        r.priceold = s.priceold;
                                        r.pricenow = s.pricenow;
                                        r.sales = s.sales;
                                        r.unit = s.unit;
                                        $('#floating-good .close').click();
                                    }
                                });
                            }
                            else if(!repaction){
                                var Gid = 'G'+new Date().getTime();
                                // 执行添加
                                m.data.push({id:Gid,img:s.img,goodid:s.goodid,name:s.name,priceold:s.priceold,pricenow:s.pricenow});
                            }
                        }
                    });
                }
            });
        }
        $scope.selectGoods = [];

        $scope.load = function(){}
        $scope.changeImg = function(Mid,n){
            width = parseInt($(".fe-mod-move").width());
            height = (width* parseInt( n.replace("%","") ) /100)-16;
            $("div[mid="+Mid+"] .fe-mod-8-main-img img").height(height);
        };
        $scope.setimg = function(Mid,n){
            width = $(".fe-mod-move").width();
            n = n.replace("%","");
            n = n/100;
            $("div[mid="+Mid+"] .fe-mod-12 img").height(width*n-30);
        }
        $scope.setfocus = function(Mid,e){
            $scope.focus = Mid;
            ccc = $("div[id="+Mid+"]").offset().top;
            ddd = (ccc-280)>=0?(ccc-280):0;
            $(".fe-panel-editor").css("margin-top",ddd+"px");
            $(document.body).animate({scrollTop:ccc-100},500);
        }
        $scope.drag = function(Mid){
            var container = $("#editor");
            var del = container.find(".fe-mod-move");
            del.off("mousedown").mousedown(function(e) {
                $scope.focus = Mid;
                if(e.which != 1 || $(e.target).is("textarea") || window.kp_only) return;
                e.preventDefault();
                var x = e.pageX;
                var y = e.pageY;
                var _this = $(this).parent();
                var w = _this.width();
                var h = _this.height();
                var w2 = w/2;
                var h2 = h/2;
                var p = _this.position();
                var left = p.left;
                var top = p.top;
                window.kp_only = true;
                _this.before('<div id="kp_widget_holder"></div>');
                var wid = $("#kp_widget_holder");
                var nod = $(".fe-mod-nodrag");
                wid.css({"border":"2px dashed #ccc", "height":_this.outerHeight(true)});
                _this.css({"width":w, "height":h, "position":"absolute", opacity: 0.8, "z-index": 900, "left":left, "top":top});
                $(document).mousemove(function(e) {
                    $scope.focus = Mid;
                    e.preventDefault();
                    var l = left + e.pageX - x;
                    var t = top + e.pageY - y;
                    _this.css({"left":l, "top":t});
                    var ml = l+w2;
                    var mt = t+h2;
                    del.parent().not(_this).not(wid).each(function(i) {
                        var obj = $(this);
                        var p = obj.position();
                        var a1 = p.left;
                        var a2 = p.left + obj.width();
                        var a3 = p.top;
                        var a4 = p.top + obj.height();
                        if(a1 < ml && ml < a2 && a3 < mt && mt < a4) {
                            if(!obj.next("#kp_widget_holder").length) {
                                wid.insertAfter(this);
                            }else{
                                wid.insertBefore(this);
                            }
                            return;
                        }
                    });
                });
                $(document).mouseup(function() {
                    $(document).off('mouseup').off('mousemove');
                    $(container).each(function() {
                        var obj = $(this).children();
                        var len = obj.length;
                        if(len == 1 && obj.is(_this)) {
                            $("<div></div>").appendTo(this).attr("class", "kp_widget_block").css({"height":100});
                        }
                        else if(len == 2 && obj.is(".kp_widget_block")){
                            $(this).children(".kp_widget_block").remove();
                        }
                    });
                    var p = wid.position();
                    _this.animate({"left":p.left, "top":p.top}, 100, function() {
                        _this.removeAttr("style");
                        wid.replaceWith(_this);
                        window.kp_only = null;
                        var arr = [];
                        $(".fe-mod-repeat").find(".fe-mod-parent").each(function(i,val) {
                            arr[i] = val.id;
                        });
                        var newarr = [];
                        angular.forEach(arr, function(aid){
                            angular.forEach($scope.Items, function(obj){
                                if(obj.id== aid){
                                    newarr.push(obj);
                                    return false;
                                }
                            });
                        });
                        $scope.Items = newarr;
                    });
                });
            });
        }

        $scope.addItem = function(Nid){
            var Mid = 'M'+new Date().getTime();
            var Navs = $scope.navs;
            angular.forEach(Navs, function(n,index) {
                if(n.id==Nid){
                    newparams = !clone(n.params)?'':clone(n.params);
                    newdata = !n.data?'':cloneArr(n.data);
                    newother = !clone(n.other)?'':clone(n.other);
                    newcontent = !clone(n.content)?'':clone(n.content);
                    if(Nid=='cube'){
                        for (row = 0; row < 4; row++) {
                            for (newparams.layout[row] = {}, col = 0; col < 4; col++) {
                                newparams.layout[row][col] = {cols: 1,rows: 1,isempty: !0,imgurl: "",classname: ""};
                            }
                        }
                    }
                    var newitem = {id:Mid,temp:Nid,params:newparams,data:newdata,other:newother,content:newcontent};
                    var insertindex = -1;
                    if($scope.focus!=''){
                        var Items = $scope.Items;
                        angular.forEach(Items, function(a,index) {
                            if(a.id==$scope.focus){
                                insertindex = index;
                            }
                        });
                    }
                    if(insertindex==-1){
                        $scope.Items.push(newitem);
                    }
                    else{
                        $scope.Items.splice(insertindex+1, 0, newitem);
                    }
                    //$("div[id="+newitem.id+"]").trigger('ng-click');
                    setTimeout(function(){
                        $scope.setfocus(newitem.id,null);
                    },100);

                    //console.log($scope.Items);
                }
            });
        }

        $scope.delItem = function(id){
            if(confirm("此操作不可逆，确认移除？")){
                var Items = $scope.Items;
                angular.forEach(Items, function(a,index) {
                    if(a.id==id){
                        Items.splice(index,1);
                        $scope.focus = '';
                    }
                });
            }
        }
        $scope.over = function(id){$("div[id="+id+"]").parent().find(".fe-mod-del").stop().show();}
        $scope.out = function(id){$("div[id="+id+"]").parent().find(".fe-mod-del").stop().hide();}
        $scope.save = function(n){
            var pageid = "<?php echo $pageid; ?>";
            var items = cloneArr($scope.Items );
            angular.forEach(items, function(m,index1) {
                if(m.temp=='richtext'){
                    m.content = escape(m.content);
                }
            });
            var datas = angular.toJson(items);
            var pageinfo = angular.toJson($scope.pages);
            var pagename = $("input[name=pagename]").val();
            var pagetype = $("input[name=pagetype]").val();
            if(!pagename){
                alert('请给你的页面起一个响亮的名字吧');
                return;
            }
            if(!pagetype){
                alert('你还没有选择页面的类型哦~');
                return;
            }
            if(window.dosave=='1'){
                alert('触发关键字已存在！请重新填写。');
                $scope.focus = 'M0000000000000';
                return;
            }
            $(".fe-save-submit").text('保存中...').addClass("fe-save-disabled").data('saving','1');
            $(".fe-save-submit2").css("color","#bbb");
            if($(".fe-save-submit").data('saving')==1){
                $.ajax({
                    type: 'POST',
                    url: "{php echo $this->createPluginWebUrl('designer',array('op'=>'api','apido'=>'savepage'))}",
                    data: {pageid: pageid,datas:datas,pagetype:pagetype,pagename:pagename,pageinfo:pageinfo},
                    success: function(data){
                        if(n==2){
                            alert("保存成功！正在生成览页面...");
                            setcookie(data);
                            if(!pageid){
                                location.href = "{php echo $this->createPluginWebUrl('designer',array('op'=>'post'))}&pageid="+data;
                            }else{
                                preview(data);
                            }
                        }else{
                            alert("保存成功！");
                            if(!pageid){
                                location.href = "{php echo $this->createPluginWebUrl('designer',array('op'=>'post'))}&pageid="+data;
                            }
                        }
                        $(".fe-save-submit").text('保存').removeClass("fe-save-disabled").data('saving','0');
                        $(".fe-save-submit2").css("color","#4bb5fb")
                    }
                    ,error: function(){
                        alert('保存失败请重试');
                        $(".fe-save-submit").text('保存').removeClass("fe-save-disabled").data('saving','0');
                        $(".fe-save-submit2").css("color","#4bb5fb")
                    }
                });
            }
        }

        $scope.addGood = function(action,Mid,Gid){
            $('#floating-good').modal();
            $('#floating-good').attr({'action':action,'Gid':Gid});
        }

        $scope.delGood = function(Mid,Gid){
            if(confirm("此操作不可逆，确认移除？")){
                var Items = $scope.Items;
                angular.forEach(Items, function(m,index1) {
                    if(m.id==Mid){
                        angular.forEach(m.data, function(g,index2) {
                            if(g.id==Gid){
                                m.data.splice(index2,1);
                            }
                        });
                    }
                });
            }
        }

        $scope.shopImg = function(Mid){
            require(['jquery', 'util'], function($, util){
                util.image('',function(data){
                    var Items = $scope.Items;
                    angular.forEach(Items, function(m,index1) {
                        if(m.id==Mid){
                            m.params.bgimg = data['url'];
                            $("div[mid="+Mid+"]").mouseover();
                        }
                    });
                });
            });
        }

        $scope.pageImg = function(Mid,type){
            require(['jquery', 'util'], function($, util){
                util.image('',function(data){
                    if(type=='floatimg'){
                        $scope.pages[0].params.floatimg = data['url'];
                    }else{
                        $scope.pages[0].params.img = data['url'];
                    }
                    $("div[mid="+Mid+"]").trigger("click");
                });
            });
        }

        $scope.$on('ngRepeatFinished',function(ngRepeatFinishedEvent){
            $('.fe-mod-2 .swipe').each(function(){
                initswipe($(this));
            })
            $('.fe-mod-8-main-img img').each(function(){
                $(this).height($(this).width());
            });
            $('.fe-mod-12 img').each(function(){
                $(this).height($(this).width());
            });
        });
    }]);
    //angular 指令
    myModel.directive('stringHtml' , function(){
        return function(scope , el , attr){
            if(attr.stringHtml){
                scope.$watch(attr.stringHtml , function(html){
                    el.html(html || '');
                });
            }
        };
    });
    //angular 指令
    myModel.directive("onFinishRenderFilters",function($timeout){
        return{
            restrict: 'A',
            link: function(scope,element,attr){
                if(scope.$last === true){
                    $timeout(function(){
                        scope.$emit('ngRepeatFinished');
                    });
                }
            }
        };
    });
</script>


