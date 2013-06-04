<style>
    .port-left{width:755px; float:left;}
    .port-right{width:315px; float:right;}
    .ContentSubHead  a {     font-family: 'PTSans-Bold';     font-size: 19px !important;     padding: 10px 0; color:#025D9A}
    .ContentSubHead  a:hover{color:#F86800;}
    .undertitle{display:block; font-size:13px; color:#979797; font-family: 'Allerta-Regular';}  
    .undertitle a{display:inline-block; font-size:13px !important ; color:#F86800;} 
    .undertitle a:hover{color:#737373;}
    .blog-img {     margin: 11px 0;     text-align: center;} 
    .port-left p {    color: #979797;      font-size: 13px;    line-height: 20px; margin-bottom:8px;}
    .readmore a {    display: inline-block;     float: right;     font-size: 14px !important; font-family: 'PTSans-Bold';   color:#F86800  }
    .readmore a:hover{color:#025D9A  }
    .text-holder{margin-bottom:20px; border-bottom:1px solid #e6e6e6; padding-bottom:50px;}
    .side-bar-heading, .block-recent_posts h3, .block-categories h3, .block-search h3{font:20px/31px 'PTSans-Bold'; padding-bottom:15px; }


    .sidebarBox > input {   border: 1px solid #AFAFAF;    padding: 9px; float:left; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; }
    .search-button{border:none;   cursor: pointer;     margin-left: 5px;     padding: 8px 12px !important; }
    .search-box{width:218px; }
    .sidebarBox, .block-categories, .block-recent_posts{ margin-bottom:50px; display:block; border-bottom:1px solid #D0D0D0; padding-bottom:40px;}
    .recent ul li a,  .vocabulary ul li a, .node-list ul li a{color:#979797; font-size:13px; font-family: 'Allerta-Regular';}
    .recent ul li a:hover,  .vocabulary ul li a:hover, .node-list ul li a:hover{color:#F86800;}
    .recent ul li, .vocabulary ul li, .node-list ul li{background:url("http://unlimitedpractice.com/venue50/img/li.png") no-repeat 0px 6px; margin-bottom:7px; padding-left:22px; line-height:22px;}
    .ContentSubRead { font-family: 'PTSans-Bold';     font-size: 33px !important;     padding: 10px 0; color:#025D9A; padding-bottom:5px;}
    .para-heading{font:16px/25px 'PTSans-Bold'; padding:15px 0 4px; color:#F86800}
    .comments-title{font:20px/31px 'PTSans-Bold'; padding-bottom:15px; color:#000; margin-top:50px;  border-bottom:1px solid #e6e6e6 }
</style>
<div class="fullWidth" style="border-bottom: 3px solid #F86800; "> <!-- Heading Full Width(About)-->

    <div class="wrapper">
        
            <div class="body-content page-heading darkblue-color">
                Blogs
                <div class="clear"></div>
            </div>
        

        <div class="port-left">
<?php  foreach ($nodes AS  $node) { ?>
            <div class="text-holder"> <!--Blog entry -->
                <div class="ContentSubHead font16 blue"><?php
                     //     echo $this->Html->link($title_name, array('action' => 'view', $nodes[$key]['Node']['parent_id']));
                     echo $this->Html->link($node['Node']['title'], array(
                         //'admin' => false,
                         'controller' => 'nodes',
                         'action' => 'blog'
                         //'type' => $node['Node']['type'],
                         //'slug' => $title_slug,
                     ));
                     ?></div>
                <div class="undertitle">Posted by Admin  on <?php echo $node['Node']['updated']; ?> in <a href="/blog/category/things-we-love"><?php //echo $node['Node']['terms']); ?></a> </div>
                <div class="blog-img">
                    <?php if (!empty($node['Nodeattachment'][0]['path'])) { ?>
                    <a href="#">
                      
                   <?php echo $this->Html->image($node['Nodeattachment'][0]['path'], array('alt' => '', 'class' => '', 'width' => '600', 'height' => '386', $node['Node']['id'])); ?>   
                        
                                       
           <!--<img width="600" height="386" src="http://venuemob.com.au/blog/wp-content/uploads/2013/04/ultimate-gbw-silver.jpg" alt="good-beer-week">-->
                    </a> <?php }
                    
                    else{ ?>
                      <a href="#">
                      
                   <img width="600" height="386" src="http://venuemob.com.au/blog/wp-content/uploads/2013/04/ultimate-gbw-silver.jpg" alt="good-beer-week">   
                  
                    </a>  
                        
                   <? }
                    
                    ?>
                </div>
                <p><?php echo $node['Node']['body']; ?>
                <div class="readmore"></span>
                    </p>
                </div>
            </div>

<?php } ?>


            <div class="clear"></div>
            <div class="paging"><?php echo $this->Paginator->numbers(); ?></div>
        </div><!--left ends -->




 
        <div class="port-right"><!--right side bar starts-->
          <form id="searchform" action="javascript: document.location.href=''+Croogo.basePath+'search/q:'+encodeURI($('#searchform #q').val());" method="post">
              <div class="sidebarBox">
                <div class="side-bar-heading">Search</div>
               
                <input  type="text" class="search-box" name="q" id="q"  style="width: 170px;" /><input type="submit"  class="search-button button"  />
               
                <div class="clear"></div>
            </div>
 </form>

            




            
            

<div id="sidebar" class="grid_5">
			<?php echo $this->Regions->blocks('right'); ?>
			</div>

            <div class="clear"></div>
        </div><!--right side bar ends -->



        <div class="clear"></div>
    </div>
</div>
</div>


<div class="wrapper">
    <div class="clear"></div>

    <div class="clear"></div>
</div>

