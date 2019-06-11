<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $CSS = array('index');?>
<?php include template('header');?>
<!--第一屏-->
<div class="pbin clearfix"><span>公司新闻：</span>
    <ul>
        <?php if(is_array($news)) { foreach($news as $n) { ?>
        <li><span><?php echo date('Y-m-d h:i:sa',$n['addtime'])?></span>
            <a href="<?php echo $n['linkurl'];?>" style="color: #0066cc;" target="_blank"><?php echo $n['title'];?></a>
        </li>
        <?php } } ?>
    </ul>
</div>
<div class="pbin clearfix"><span>最新资讯：</span>
    <ul>
        <?php if(is_array($article)) { foreach($article as $m) { ?>
        <li>
            <a href="news/<?php echo $m['linkurl'];?>" style="color: #0066cc;" target="_blank"><?php echo $m['title'];?></a>
        </li>
        <?php } } ?>
    </ul>
</div>
<div class="pbin_link clearfix"><span>友情链接：</span>
    <ul>
        <li>
            <a href="http://www.yunshangxun.cn/" target="_blank">云商讯</a>
        </li>
        <li>
            <a href="http://www.dm67.com/" target="_blank">dm67</a>
        </li>
        <li>
            <a href="http://www.35mc.com/qiye/" target="_blank">商虎机械网</a>
        </li>
        <li>
            <a href="http://www.huohuasai.org.cn/qyxw/" target="_blank">火花塞网</a>
        </li>
        <li>
            <a href="http://qynews.kuaidiwo.cn/" target="_blank">快递窝商讯</a>
        </li>
        <li>
            <a href="http://paper.kbcmw.com/gzsx/" target="_blank">甘孜日报</a>
        </li>
        <li>
            <a href="http://www.qqma.com/flsx/" target="_blank">全球机械网</a>
        </li>
        <li>
            <a href="http://www.shuyang.tv/synews/" target="_blank">沭阳网</a>
        </li>
        <li>
            <a href="http://www.famer.com.cn/qyfw/" target="_blank">企业服务</a>
        </li>
        <li>
            <a href="https://www.bbaqw.com/csnews/" target="_blank">佰佰安全网</a>
        </li>
        <li>
            <a href="http://www.10260.com/" target="_blank">天赐网</a>
        </li>
        <li>
            <a href="http://www.sitongzixun.com/stnews/" target="_blank">乐宇通商讯</a>
        </li>
        <li>
            <a href="http://www.chemcp.com/" target="_blank">中国化工产品网</a>
        </li>
        <li>
            <a href="http://www.mx8.com/qixing/" target="_blank">商讯</a>
        </li>
        <li>
            <a href="http://www.sdjinlan.com/" target="_blank">山东企划网</a>
        </li>
    </ul>
</div>
<!-- 主体结束 -->
<div class="pbin_link clearfix"><span>全站链接：</span>
    <ul>
        <li>
            <a href="http://www.huizhou.cn/flsx/" target="_blank">今日惠州网</a>
        </li>
        <li>
            <a href="http://www.hznews.com/flsx/" target="_blank">惠州云商讯</a>
        </li>
    </ul>
</div>
<?php include template('footer');?>