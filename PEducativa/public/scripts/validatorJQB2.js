
(function($){
     $.fn.JQBConfig = function(config){
        return new JQBValidator(this,config);
 
    };
    /*Declaring the class JQBValidator*/
    var JQBValidator = function( element,  options ){
        
        var settings = $.extend({
            
                required : false,
                maxLen : 30,
                minLen : 0,
                messageError: "",
                messageSuccess: ""
            
        }, options || {});
 
        this.validateDivText = function(){
       
        return fnerrorDivTag(element,settings);

        };
        this.validateInputText = function(){
       
        return fnerrorEmptyTag(element,settings);

        };

        
 
        
    }
 
   
})(jQuery);







function fnerrorEmptyTag(element,rules)
{

var tagMessage = "";
var div = $("<div id='JQB_Element'></div>");
var taggedError = false;


if ((element.val().length >= rules.minLen) && (element.val().length <= rules.maxLen)  &&
    ((element.val().length >= 0 && rules.required == false) || (element.val().length > 0 && rules.required == true)))
{
    tagMessage = "has-success";
}
else
{
    tagMessage = "has-error";
    taggedError = true; 
}
var parent = element.parent();
if(parent.is("#JQB_Element")){    
    parent.removeClass();
    parent.addClass(tagMessage);
    if(taggedError) {
        parent.find("p").remove();
        parent.append("<p style='color:red;'>" + rules.messageError + "</p>");
    }
    else {
        parent.find("p").remove();
        if(element.messageSuccess !="") parent.append("<p style='color:green;'>" + rules.messageSuccess + "</p>");
    }
   

} 
else {
    div.addClass(tagMessage);
    element.wrap(div); 
    var parentActual = element.parent();  
    if(taggedError) parentActual.append("<p style='color:red;'>" + rules.messageError + "</p>");
    else {
      if(element.messageSuccess !="") parentActual.append("<p style='color:green;'>" + rules.messageSuccess + "</p>");
    }
}



return ((element.val().length >= rules.minLen) && (element.val().length <= rules.maxLen)  &&
    (element.val().length >= 0 && rules.required == false) || (element.val().length > 0 && rules.required == true)) ;
}

function fnerrorDivTag(element,rules)
{

var tagMessage = "";
var div = $("<div id='JQB_Element'></div>");
var taggedError = false;


if ((element.text().length >= rules.minLen) && (element.text().length <= rules.maxLen)  &&
    ((element.text().length >= 0 && rules.required == false) || (element.text().length > 0 && rules.required == true)))
{
    tagMessage = "form-group has-success";
}
else
{
    tagMessage = "form-group has-error";
    taggedError = true; 
}
var parent = element.parent();
if(parent.is("#JQB_Element")){    
    parent.removeClass();
    parent.addClass(tagMessage);
    if(taggedError) {
        parent.find("p").remove();
        parent.append("<p style='color:red;'>" + rules.messageError + "</p>");
    }
    else {
        parent.find("p").remove();
        if(element.messageSuccess !="") parent.append("<p style='color:green;'>" + rules.messageSuccess + "</p>");
    }
   

} 
else {
    div.addClass(tagMessage);
    element.wrap(div); 
    var parentActual = element.parent();  
    if(taggedError) parentActual.append("<p style='color:red;'>" + rules.messageError + "</p>");
    else {
      if(element.messageSuccess !="") parentActual.append("<p style='color:green;'>" + rules.messageSuccess + "</p>");
    }
}



return ((element.text().length >= rules.minLen) && (element.text().length <= rules.maxLen)  &&
    (element.text().length >= 0 && rules.required == false) || (element.text().length > 0 && rules.required == true)) ;
}