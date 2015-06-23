        <!-- **Footer*/* -->
        <footer id="footer">
            <div class="copyright">
            	 <?php
                   //if(!isset($home_pages_sections)){
                        $home_pages_sections=$this->adminhomepage_model->get_home_page_sections($this->config->item('cache_page'),$langDetails);
                       // print_r($home_pages_sections);
                    //}
					//print_r($home_pages_sections);
                    if (!empty($home_pages_sections[27]->content)) {
                        echo html_entity_decode($home_pages_sections[27]->content);
                    }
                    ?>		
				<div class="container">
                	<p class="footer_copyright">© 2005- 2015  <a href="#">Forexbull</a> All rights reserved.</p>
                    <ul class="footer-links">
                    	<li><a href="index.html">Anti-Money Laundering</a>/</li>
                        <li><a href="about.html">Disclaimer</a>/</li>
                        <li><a href="#">Privacy Policy</a>/</li>
                        <li><a href="#">Risk Warnings</a>/</li>
                        <li><a href="#">Execution Methodology</a>/</li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </footer> <!-- **Footer - End** -->

</body>
</html>
