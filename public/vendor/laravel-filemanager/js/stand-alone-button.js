(function ($) {
    function myLink(item, index) {
        if (index == 0 || index == 1) {
        } else {
            item.join("/");
        }
    }

    $.fn.filemanager = function (type, options) {
        type = type || "file";

        this.on("click", function (e) {
            var route_prefix =
                options && options.prefix ? options.prefix : "/filemanager";
            var target_input = $("#" + $(this).data("input"));
            var target_preview = $("#" + $(this).data("preview"));
            window.open(
                route_prefix + "?type=" + type,
                "FileManager",
                "width=900,height=600"
            );
            window.SetUrl = function (items) {
                var file_path = items
                    .map(function (item) {
                        return item.url;
                    })
                    .join(",");

                // set the value of the desired input to image url
                const myArray = file_path.split("/");
                myArray.splice(0, 3);
                // const linkFile = myArray.forEach(myLink);
                target_input
                    .val("")
                    .val("/" + myArray.join("/"))
                    .trigger("change");

                // clear previous preview
                target_preview.html("");

                // set or change the preview image src
                items.forEach(function (item) {
                    target_preview.append(
                        $("<img>")
                            .css("height", "5rem")
                            .attr("src", item.thumb_url)
                        // $(target_preview).css('height', '5rem').attr('src', item.thumb_url)
                    );
                });

                // trigger change event
                target_preview.trigger("change");
            };
            return false;
        });
    };
})(jQuery);
