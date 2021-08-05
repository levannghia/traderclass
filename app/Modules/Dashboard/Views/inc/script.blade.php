<script type="text/javascript">
    var _token = "{{ csrf_token() }}";
    function checkDelBoxes(pForm, boxName, parent) {
        for (var i = 0; i < pForm.elements.length; i++) {
            if (pForm.elements[i].name == boxName) {
                pForm.elements[i].checked = parent;
            }
        }
        if (!parent) {
            $("[delete-all]").attr("href", $("[delete-all]").attr("url") + "/[{}]");
        } else {
            deleteAllList($("input[name='check[]']"));
        }
    }

    function deleteAllList(control) {
        var listid = control.map(function (index, data) {
            return $(data).val();
        });
        var dataJson = "[", sumb = ",";
        $(listid).each(function (index, value) {
            dataJson += (index > 0 ? sumb : "") + '{"id":' + value + "}";
        });
        dataJson += "]";
        $("[delete-all]").attr("href", $("[delete-all]").attr("url") + "/" + dataJson);
    }


    $("input[name='check[]']").click(function () {
        var dataJson = "[", sumb = ",";
        var listid = $("input[name='check[]']:checked").map(function (index, data) {
            return $(data).val();
        });
        console.log(listid);
        $(listid).each(function (index, value) {
            dataJson += (index > 0 ? sumb : "") + '{"id":' + value + "}";
        });
        dataJson += "]";
        $("[delete-all]").attr("href", $("[delete-all]").attr("url") + "/" + dataJson);
    });

    $("div.alert").delay(8000).slideUp();

    $('.table-responsive').on('show.bs.dropdown', function () {
        $('.table-responsive').css("overflow", "inherit");
    });

    $('.table-responsive').on('hide.bs.dropdown', function () {
        $('.table-responsive').css("overflow", "auto");
    });

    function format_price(tag, price) {
        var price = price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
        $(tag).html(price);
    }
    /*CKEDITOR.replace("content", {
     filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
     });*/

    ckEditor("content");

    function ckEditor(name) {
        if ($('textarea[name="' + name + '"]').length) {
            CKEDITOR.replace(name, {
                filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}'
            });
        }
    }
</script>
