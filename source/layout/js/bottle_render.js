/*$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};*/



var canvas,context;


var config = {
	bottle_width : 228,
	bottle_height: 330,
	text_color : "#E8B876",
	max_width : 130,
	template_y : 390,
	template_x: 49,
	small_height : 90,
	medium_height : 125,
	large_height : 253,
}

var textArray = [];
var imgArray = [];
var bottle = new Image();
var form_info;

var template_id = 1;

function init(){
	canvas = document.getElementById('myCanvas');
	context = canvas.getContext('2d');
	bottle.src = 'images/common/bottle_ori_1_back.png';
	/*bottle.onload = function() {
		context.drawImage(bottle, 0, 0);
	};*/
	//form_info = $('#master_form').serializeObject();	
	drawImage(context);
	drawText(context);
}

switch(template_id){
}

function drawImage(context){
	var image = new Image();
	image.src = 'images/creative/images/1/1001.png';
	//image.setSize()
	image.onload = function(){
		var height = image.height > config.medium_height ? config.medium_height : image.height;
		var width = (height * image.width) / image.height; 
		var x = (config.max_width - image.width) / 2;
		var y = (config.medium_height - height) / 2;
		image.height = height;
		image.width = width;
		context.drawImage(image,config.template_x + x, config.template_y + y);
	}
}

function drawText(context){
	context.fillStyle  = config.text_color;
	context.font = "15.5px serif";
	context.fillText ("Chúc bạn có một Giáng Sinh đong đầy an bình và tình yêu.",config.template_x,config.template_y);
}



