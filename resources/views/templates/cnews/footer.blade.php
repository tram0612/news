<div class="footer">
				<p>
					Copyright 2016. Designed by <a class="footer-link" target="_blank"
						href="http://vinaenter.edu.vn">VinaEnter</a>
				</p>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
        
        $('.count').click(function(e) {
        	var id =$(this).attr('data-id');
          //var name =$(this).attr('');
          //console.log(id);
          // e.preventDefault();
    		$.ajax({
       			method: 'GET',
        		url: '/count',
        		data: {

           		 story_id: id,
               
      			},

    		});

       //return true;
		});//.done(function(url) { // pass the url back to the client after you  incremented it
        //window.location = url;
    //});
      
    </script>
        
  
   <!-- <script type="text/javascript">
        
        $('.count').click(function(e) {
        	
    		$.ajax({
       			method:'POST',
        		url: '/count',
        		data: {

           		 story_id: $(this).attr('data-id')
      			}
    		});
		}).done(function(url) { // pass the url back to the client after you 	incremented it
    		window.location = url;
		});
        
    </script>-->
</html>		
			
