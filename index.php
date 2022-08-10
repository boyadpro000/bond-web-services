<html>
<head>
<title>Mercedes</title>
<style>
	body {font-family:georgia;}
  
   .film{
    border:1px solid #E77DC2;
    border-radius: 20px;
    padding: 20px;
    margin-bottom:20px;
    position:relative;   
  }
 
  .pic{
    position:absolute;
    right:10px;
    top:10px;
  }
  
  .pic img{
	max-width:200px;
  max-height:110px;
  }

</style>
<script src="https://code.jquery.com/jquery-latest.js"></script>

<script type="text/javascript">

  function bondTemplate(film){

    return `
    <div class="film">
            <b>Year</b>: ${film.Year}<br /> 
            <b>Model</b>: ${film.Model}<br /> 
            <b>Horsepower</b>: ${film.Horsepower}<br /> 
            <b>Torque</b>: ${film.Torque}<br /> 
            <b>MSRP</b>: ${film.MSRP}<br /> 
            <div class="pic"><img src="thumbnails/${film.Image}" /></div>
      </div>
    `;
    
  }
  
$(document).ready(function() { 

 $('.category').click(function(e){
   e.preventDefault(); //stop default action of the link
   cat = $(this).attr("href");  //get category from URL
  
   var request = $.ajax({
     url: "api.php?cat=" + cat,
     method: "GET",
     dataType: "json"
   });
   request.done(function( data ) {
    console.log(data);

     // place data.title on page 

     $("#filmtitle").html(data.title);

     // clear previous data
     $("#films").html("");

     // loop thru data.films and place on page
     $.each(data.films,function(i,item){

      let myData = bondTemplate(item);
       $("<div></div>").html(myData).appendTo("#films");
       
     });

     // let myData = JSON.stringify(data,null,4);
     // myData = "<pre>" + myData + "</pre>";
     // $("#output").html(myData);

   });
   request.fail(function(xhr, status, error ) {
alert('Error - ' + xhr.status + ': ' + xhr.statusText);
   });

  });
}); 



</script>
</head>
	<body>
	<h1>Choose Your Mercedes</h1>
		<a href="year" class="category">Mercedes Cars 2015+</a><br />
		<a href="box" class="category">Mercedes Cars 2009-2014</a>
		<h3 id="filmtitle">Best Mercedes Money Can Buy!</h3>
		<div id="films">
      
			<div class="film">
        
            <b>Year</b>: 2021<br /> 
            <b>Model</b>: S63<br /> 
            <b>Horsepower</b>: 637HP<br /> 
            <b>Torque</b>: 664lb-ft<br /> 
            <b>MSRP</b>: $173,100<br /> 
            <div class="pic"><img src="thumbnails/S633.jpg" /></div>
      </div>
        
		</div>
		<!--<div id="output">Results go here</div>-->
	</body>
</html>