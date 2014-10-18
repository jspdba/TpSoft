/**
 * Created by hadoop on 14-9-26.
 */

(function($){
    $.extend($.fn, {
        contact:function(json){
            var settings = {
                url: "",// 数据获取url
                parameter: "path",// 数据获取参数名称
                title: "title",// 定义JSON数据格式：选择名称
                value: "value",// 定义JSON数据格式：选择值
                query:".contact",//次级菜单默认选择器
                selected:""//次级菜单默认值
            };
            $.extend(settings, options);
            /*自定义参数结束*/
            /*开始返回 jquery 对象--真正执行的地方*/
            return this.each(function(){
                var $this = $(this);//当前对象

                //添加选择事件
                $this.bind("change", function(){
                    getJson($this.val())//填充此select，并且设置默认值
                });

                function getJson(key){
                    var url=settings.url;
                    var parameter = settings.parameter;

                    if (parameter != null) {
                        if(url.indexOf("?") > 0) {
                            url = url + "&" + parameter + "=" + key;
                        } else {
                            url = url + "?" + parameter + "=" + key;
                        }
                    }

                    $.getJSON(url,function(data){
                        var a=$(settings.query);
                    });
                }

            });
        }
    });
})(jQuery);