<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="/js/jquery-3.5.1.js"></script>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
           支付测试
        </h3>
    </div>
    <div class="panel-body">
        <div class="col-xs-4 ">
            <button class="btn-info btn-sm" onclick="wx()">微信支付</button>
        </div>
        <div class="col-xs-4 ">
            <button class="btn-primary btn-sm" onclick="ali()">支付宝支付</button>
        </div>
    </div>
</div>

<script>
    function wx(){
        $.ajax({
            type: "get",
            url: 'wx-pay/',
            success: function (res) {
                var resData = JSON.parse(res);
                window.location.href = resData.data
            }
        })
    }
    function ali(){
        $.ajax({
            type: "get",
            url: 'ali-pay/',
            success: function (res) {
                var resData = JSON.parse(res);
                const div = document.createElement('div')
                div.id = 'alipay'
                div.innerHTML = resData.data
                document.body.appendChild(div)
                document.querySelector('#alipay').children[0].submit() // 执行后会唤起支付宝
            }
        })
    }
</script>
