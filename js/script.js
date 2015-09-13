$(function()
{	

	$('article span').hide();

	$('#newentry').click(function()
	{
		$('#entryform').toggleClass('hidden');
		showButtons();
		$('#entrybox').focus();
	});
	
	$('#entrybox').keypress(function(e)
	{
		if (e.which == 13)
		{
			e.preventDefault();	//Pressing enter usually makes new line on textarea elements, this prevents the default result	
			submitbox();	
		}
	});
	
	$('#topButton').click(function()
	{
		$('html,body').animate({scrollTop: 0}, 'slow');
	});

	$('article span').on({
		"mouseover" : function() {
		$article = $(this).closest('li');
		$article.css({'background-color': 'rgba(200, 0, 0, 0.2)'});
		},
			"mouseleave" : function(){
			$article.css({'background-color': 'transparent'});
		}
	});

	$('article').on({
		"mouseover" : function() {
		$span = $(this).find('span');
		$span.show();
		},
			"mouseleave" : function(){
			$span.hide();
		}
	});

});


function showButtons()
{
	$('#entrybox').show();
}

function submitbox()
{
		if ($('#entrybox').val() =="")
		{
			alert('A diary entry cannot be empty');
		}
		else
		{
			postToDB();
		}
}

function postToDB()
{
	$today = new Date();
	$blogdate = $today.getDate() + "/" + ($today.getMonth() + 1) + "/" + $today.getFullYear();
	$blogpost = $('#entrybox').val();

	$.ajax({
            url: "ajax/add-post.ajax.php",
            type: "POST",
            data: {
                'date' : $blogdate,
                'post' : $blogpost
            }, // End data
            'beforeSend' : function() {
            }, // End beforeSend callback
            'success' : function(response) {
                $id = response;

                $('#entrybox').val('');        

                $output = "<li>";
			    $output += "<article>";
			    $output += "<h1>" + $blogdate + "</h1>";
			    $output += "<p>" + $blogpost + "</p>";
			    $output += "</article>";
			    $output += "</li>";

			    $('article:first').before($output);          
            } // End success callback
        }); // End AJAX
}