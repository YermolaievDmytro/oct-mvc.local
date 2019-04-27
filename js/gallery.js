$('[name="photoupload"]').submit(function(event){
    var data = new FormData(document.forms.photoupload);
    $.ajax({
	url:$(this).attr('action'),
	data: data,
	contentType: false,//$(this).attr('enctype'),
	processData: false,
	type: $(this).attr('method'),
	success: function(){
	    alert('photo upload');
	}
    });
    event.preventDefault();
});


