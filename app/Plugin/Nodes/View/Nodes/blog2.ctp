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
    .side-bar-heading{font:20px/31px 'PTSans-Bold'; padding-bottom:15px; }


    .sidebarBox > input {   border: 1px solid #AFAFAF;    padding: 9px; float:left; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; }
    .search-button{border:none;   cursor: pointer;     margin-left: 5px;     padding: 8px 12px !important; }
    .search-box{width:218px; }
    .sidebarBox{ margin-bottom:50px; display:block; border-bottom:1px solid #D0D0D0; padding-bottom:40px;}
    .recent ul li a{color:#979797; font-size:13px; font-family: 'Allerta-Regular';}
    .recent ul li a:hover{color:#F86800;}
    .recent ul li{background:url("http://unlimitedpractice.com/venue50/img/li.png") no-repeat 0px 6px; margin-bottom:7px; padding-left:22px; line-height:22px;}
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
                <div class="undertitle">Posted by  on <?php echo $node['Node']['created']; ?> in <a href="/blog/category/things-we-love"><?php //echo $node['Node']['terms']); ?></a> </div>
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
                <div class="readmore"><a href="http://venuemob.com.au/blog/good-beer-week-2013-venuemob-picks-and-excitement/">Read more...</a></span>
                    </p>
                </div>
            </div>

<?php } ?>

<!--            <div class="text-holder"> Blog entry 
                <div class="ContentSubHead font16 blue"><a href="#">Easter Eggs, Not-of-the-chocolate-type: some of the hidden things programmers add</a></div>
                <div class="undertitle">Posted by  on 2013-05-15 22:55:46 in <a href="/blog/category/things-we-love">Things we love</a> </div>
                <div class="blog-img">
                    <a href="#"><img width="600" height="386" src="https://lh3.googleusercontent.com/Kx4LxENMw-NIw53g_0OfNNjeZHGEe2ON2eB5Oa4GrgC8uFaXoGf6B3WHg_N1ctka-sJa-MAtFSCtOqiqQrZ9apXsp3ZDyXWJ7AZzO00qk10aoOtK2z2ASrEp" alt="good-beer-week"></a>
                </div>
                <p>If there's one thing Venuemob likes, it's beer. We like plenty of other things sure, but if we had to list all the things we like ... we're pretty &nbsp; sure beer would be near the top of said list. Why? Beer is tasty. It's tasty in the sunshine, it's tasty at night,...
                <div class="readmore"><a href="http://venuemob.com.au/blog/good-beer-week-2013-venuemob-picks-and-excitement/">Read more...</a></span>
                    </p>
                </div>
            </div>-->





<!--            <div class="text-holder"> Blog entry 
                <div class="ContentSubHead font16 blue"><a href="#">Welcome! Venuemob blog relaunches. </a></div>
                <div class="undertitle">Posted by  on 2013-05-15 22:55:46 in <a href="/blog/category/things-we-love">Things we love</a> </div>
                <p>If there's one thing Venuemob likes, it's beer. We like plenty of other things sure, but if we had to list all the things we like ... we're pretty &nbsp; sure beer would be near the top of said list. Why? Beer is tasty. It's tasty in the sunshine, it's tasty at night,...
                <div class="readmore"><a href="http://venuemob.com.au/blog/good-beer-week-2013-venuemob-picks-and-excitement/">Read more...</a></span>
                    </p>
                </div>
            </div>-->



<!--            <div class="text-holder"> Blog entry 
                <div class="ContentSubHead font16 blue"><a href="#">Good Beer Week 2013: Venuemob Picks and Excitement</a></div>
                <div class="undertitle">Posted by  on 2013-05-15 22:55:46 in <a href="/blog/category/things-we-love">Things we love</a> </div>
                <div class="blog-img">
                    <a href="#"><img width="600" height="386" src="http://venuemob.com.au/blog/wp-content/uploads/2013/04/ultimate-gbw-silver.jpg" alt="good-beer-week"></a>
                </div>
                <p>If there's one thing Venuemob likes, it's beer. We like plenty of other things sure, but if we had to list all the things we like ... we're pretty &nbsp; sure beer would be near the top of said list. Why? Beer is tasty. It's tasty in the sunshine, it's tasty at night,...
                <div class="readmore"><a href="http://venuemob.com.au/blog/good-beer-week-2013-venuemob-picks-and-excitement/">Read more...</a></span>
                    </p>
                </div>
            </div>-->



<!--            <div class="text-holder"> Blog entry 
                <div class="ContentSubHead font16 blue"><a href="#">Easter Eggs, Not-of-the-chocolate-type: some of the hidden things programmers add</a></div>
                <div class="undertitle">Posted by  on 2013-05-15 22:55:46 in <a href="/blog/category/things-we-love">Things we love</a> </div>
                <div class="blog-img">
                    <a href="#"><img width="600" height="386" src="https://lh3.googleusercontent.com/Kx4LxENMw-NIw53g_0OfNNjeZHGEe2ON2eB5Oa4GrgC8uFaXoGf6B3WHg_N1ctka-sJa-MAtFSCtOqiqQrZ9apXsp3ZDyXWJ7AZzO00qk10aoOtK2z2ASrEp" alt="good-beer-week"></a>
                </div>
                <p>If there's one thing Venuemob likes, it's beer. We like plenty of other things sure, but if we had to list all the things we like ... we're pretty &nbsp; sure beer would be near the top of said list. Why? Beer is tasty. It's tasty in the sunshine, it's tasty at night,...
                <div class="readmore"><a href="http://venuemob.com.au/blog/good-beer-week-2013-venuemob-picks-and-excitement/">Read more...</a></span>
                    </p>

                </div>
            </div>-->






            <!--Blog Reading starts-->


<!--            <div class="text-holder"> Blog entry 
                <div class="ContentSubRead  blue">Good Beer Week 2013: Venuemob Picks and Excitement</div>
                <div class="undertitle">Posted by  on 2013-05-15 22:55:46 in <a href="/blog/category/things-we-love">Things we love</a> |  <a href="#com">2 Comments</a> </div>
                <div class="blog-img">
                    <a href="#"><img width="600" height="386" src="http://venuemob.com.au/blog/wp-content/uploads/2013/04/ultimate-gbw-silver.jpg" alt="good-beer-week"></a>
                </div>
                <p>If there's one thing Venuemob likes, it's beer. We like plenty of other things sure, but if we had to list all the things we like … we're pretty sure beer would be near the top of said list. Why? Beer is tasty. It's tasty in the sunshine, it's tasty at night, in the heat, and in the cold. Lounging around in the sun, or snug by the fire as it rains outside, with dinner or after dinner, during the week or as the weekend rolls around.</p>

                <p>Put it this way: we wouldn't say we don't like beer.</p>

                <p>Needless to say, the Venuemob team's pretty darn excited about the imminent Good Beer Week, happening all around Melbourne in the coming weeks. Looking through the program is an exercise in attempting not to drool all over one's keyboard. Let's be honest, this blog post is basically just an excuse to peruse the events while at work.</p>

                <p>The Venuemob office – like so many other offices or friendship circles – is made up of varying degrees of beer-lovers. There are the resident beer geeks and aficionados, the kind that will hunt down the new brews on the scene, and who describe each new sip with the verbose aplomb of the wine-lover. On the other end of the spectrum, there's the beer lover who simply loves beer. No comments on the subtle differences in flavour, no devotion to a certain brewery, just a supreme fondness for the nectar of the gods.</p>

                <p>Frankly it doesn't matter (IMHO) what camp one falls under, as long as we can enjoy a brew together in the sun, or rugged up against the cold. Which – you can see where this is going, right? – is where Good Beer Week comes into play. Wherever you happen to fall within the spectrum of "beer noob" and "beer geek", chances are there are at least a few causes for excitement throughout the event. After a bit of initial excitement, gleeful hand-clapping and aforementioned salivation, here are a few of Venuemob's picks.</p>

                <div class="para-heading">Beer vs Pig V: The Kiwis</div>

                <p>Beer and pork? We're in. There was almost no reason to read the actual event description, such is our love for beer and pig-related food products. This one's at Atticus Finch on Lygon Street (East Brunswick), and stars a dozen beers and a dozen cured pigs and probably quite a bit of beer nerdery. Do we need to go on?</p>

                <div class="para-heading">East vs West: Beer and Food Title Fight</div>

                <p>Alright, so technically this one's sold out – but that doesn't mean we can't cross our fingers and hope someone will magically appear out of nowhere with some tickets (hint hint, universe). It's basically an all-out battle between Melbourne and Perth, two cities who consider themselves the beer capital of our fair country. Six rounds of beers teamed with tasty, tasty food – all fed to the discerning group of guests, who then cast their votes. At the end, a winning city is crowned, and everyone rolls back home in a food coma. Which sounds amazing.</p>


                <div class="comments-title"><a name="com"></a>Comments</div>
                <div class="comments-here">put comments here</div>

            </div>-->












            <!--Blog Reading ends-->

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

            <div class="sidebarBox recent">
                <div class="side-bar-heading">Recent Posts</div>
                <ul>
                    <?php  foreach ($nodes AS  $node) { ?>
                    <li><a><?php echo $node['Node']['title']; ?></li>
                    <?php }?>
<!--                    <li>
                        <a title="Good Beer Week 2013: Venuemob Picks and Excitement" href="http://venuemob.com.au/blog/good-beer-week-2013-venuemob-picks-and-excitement/">Good Beer Week 2013: Venuemob Picks and Excitement</a>
                    </li>-->
                    
<!--                    <li>
                        <a title="Melbourne's Big Quirk Off" href="http://venuemob.com.au/blog/melbournes-big-quirk-off/">Melbourne's Big Quirk Off</a>
                    </li>
                    <li>
                        <a title="Don't Do These Things or: A Waitress Rants" href="http://venuemob.com.au/blog/hospitality-rant/">Don't Do These Things or: A Waitress Rants</a>
                    </li>
                    <li>
                        <a title="Startup resources" href="http://venuemob.com.au/blog/startup-resources/">Startup resources</a>
                    </li>
                    <li>
                        <a title="Unique Venues Abroad #1: Crazy cat lady's dream." href="http://venuemob.com.au/blog/unique-venues-abroad-1-crazy-cat-ladys-dream/">Unique Venues Abroad #1: Crazy cat lady's dream.</a>
                    </li>
                    <li>
                        <a title="From Celluloid to your IRL Eyes: Restaurants of the Movies" href="http://venuemob.com.au/blog/from-celluloid-to-your-irl-eyes-restaurants-of-the-movies-2/">From Celluloid to your IRL Eyes: Restaurants of the Movies</a>
                    </li>
                    <li>
                        <a title="Easter Eggs, Not-of-the-chocolate-type: some of the hidden things programmers add" href="http://venuemob.com.au/blog/easter-eggs-not-of-the-chocolate-type-some-of-the-hidden-things-programmers-add/">Easter Eggs, Not-of-the-chocolate-type: some of the hidden things programmers add</a>
                    </li>
                    <li>
                        <a title="Welcome! Venuemob blog relaunches." href="http://venuemob.com.au/blog/hello-world/">Welcome! Venuemob blog relaunches.</a>
                    </li>-->
                </ul>
            </div>





            <div class="sidebarBox recent">
                <div class="side-bar-heading">Categories</div>
                <ul>
                    <li class="cat-item cat-item-9"><a title="View all posts filed under Things we love." href="http://venuemob.com.au/blog/category/things-we-love/">Things we love.</a> (4)
                    </li>
                    <li class="cat-item cat-item-6"><a title="View all posts filed under Venue Tips and Ideas" href="http://venuemob.com.au/blog/category/venue-tips-and-ideas/">Venue Tips and Ideas</a> (1)
                    </li>
                    <li class="cat-item cat-item-7"><a title="View all posts filed under Venuemob Team Says" href="http://venuemob.com.au/blog/category/venuemob-team-says/">Venuemob Team Says</a> (3)
                    </li>
                </ul>
            </div>
            

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


</body>
</html>
