<SCRIPT language="javascript">
$(function(){
    var url = window.location.href; 
	url = url.split('&')[0];
    $(".vdLeftEmailSec a").each(function() {
        if(url == (this.href)) { 
            $(this).closest("li").addClass("active");
        }
    });
});

$(function(){
    $("#checkAll").click(function () {
          $('.case').attr('checked', this.checked);
    });
	
    $(".case").click(function(){
 
        if($(".case").length == $(".case:checked").length) {
            $("#checkAll").attr("checked", "checked");
        } else {
            $("#checkAll").removeAttr("checked");
        }
 
    });
});

$(document).ready(function(){
$("#form").validate();
});

function statusAll(view,status)
{
	var chk_arr =  document.getElementsByName("chk[]");
	var chklength = chk_arr.length;    
	var recordID = new Array();         
	for(k=0;k< chklength;k++)
	{
		if(chk_arr[k].checked)
		{
			recordID+=chk_arr[k].value+"|";
		}
	} 
	recordID = recordID.slice(0,-1);
	//alert(recordID);
	window.location = "index.php?view="+view+"&action=status&status="+status+"&id="+recordID;
}

function deleteAll(view)
{
	if(!confirm('Are you sure, You want delete this record?'))
	{
		return false;
	}
	else
	{
		var chk_arr =  document.getElementsByName("chk[]");
		var chklength = chk_arr.length;    
		var recordID = new Array();         
		for(k=0;k< chklength;k++)
		{
			if(chk_arr[k].checked)
			{
				recordID+=chk_arr[k].value+"|";
			}
		} 
		recordID = recordID.slice(0,-1);
		window.location = "index.php?view="+view+"&action=delete&id="+recordID;
	}
}

function searchRecord(view,fieldName)
{
	var value = document.getElementById('searchText').value;
	window.location = "index.php?view="+view+"&field="+fieldName+"&search="+value;
}

function resetAll(view)
{
	window.location = "index.php?view="+view;
}
</SCRIPT>