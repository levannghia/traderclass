@extends('Dashboard::layout')
@section('title', $row->title)
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">{{$row->title}}</h4>
        </div>
    </div>
</div>
@include("Dashboard::inc.message")
<form method="post">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Thống kê đơn hàng năm {{date("Y")}}</h4>
                <div id="orders_total" style="height: 350px;" class="flot-chart mt-5"></div>
            </div> <!-- end card-box -->
        </div> <!-- end col -->
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Thống kê tỷ lệ đơn hàng năm {{date("Y")}}</h4>
                <div id="ordered-bars-chart" style="height: 350px;" class="mt-5"></div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</form>
<!--<script src="/public/dashboard/assets/libs/flatpickr/flatpickr.min.js"></script>-->
<script src="/public/dashboard/assets/libs/flot-charts/jquery.flot.js"></script>
<script src="/public/dashboard/assets/libs/flot-charts/jquery.flot.time.js"></script>
<script src="/public/dashboard/assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
<script src="/public/dashboard/assets/libs/flot-charts/jquery.flot.resize.js"></script>
<script src="/public/dashboard/assets/libs/flot-charts/jquery.flot.pie.js"></script>
<script src="/public/dashboard/assets/libs/flot-charts/jquery.flot.selection.js"></script>
<script src="/public/dashboard/assets/libs/flot-charts/jquery.flot.stack.js"></script>
<script src="/public/dashboard/assets/libs/flot-charts/jquery.flot.orderBars.js"></script>
<script src="/public/dashboard/assets/libs/flot-charts/jquery.flot.crosshair.js"></script>
<?php // echo date("Y") . "-01-01 00:00:00", date("Y") . "-01-" . date("t", strtotime(date("Y") . "-01-01")) . " 23:59:59"; ?>
<script>
!function (d) {
"use strict";
var o = function () {
this.$body = d("body"), this.$realData = []
        };
o.prototype.createPlotGraph = function (o, t, a, e, r, i, l) {
d.plot(d(o), [{
data: t,
        label: e[0],
        color: r[0]
        }, {
data: a,
        label: e[1],
        color: r[1]
}], {
series: {
lines: {
show: !0,
        fill: !0,
        lineWidth: 2,
        fillColor: {
        colors: [{
        opacity: .5
        }, {
        opacity: .5
        }, {
        opacity: .8
        }]
        }
},
        points: {
        show: !0
        },
        shadowSize: 0
        },
        grid: {
        hoverable: !0,
                clickable: !0,
                borderColor: i,
                tickColor: "#f9f9f9",
                borderWidth: 1,
                labelMargin: 30,
                backgroundColor: l
        },
        legend: {
        position: "ne",
                margin: [0, - 32],
                noColumns: 0,
                labelBoxBorderColor: null,
                labelFormatter: function (o, t) {
                return o + "&nbsp;&nbsp;"
                },
                width: 30,
                height: 2
        },
        yaxis: {
        axisLabel: "Daily Visits",
                tickColor: "#f5f5f5",
                font: {
                color: "#bdbdbd"
                }
        },
        xaxis: {
        axisLabel: "Last Days",
                tickColor: "#f5f5f5",
                font: {
                color: "#bdbdbd"
                }
        },
        tooltip: !0,
        tooltipOpts: {
        content: "%s: tháng %x là %y",
                shifts: {
                x: - 60,
                        y: 25
                },
                defaultTheme: !1
        },
        splines: {
        show: !0,
                tension: .1,
                lineWidth: 1
        }
})
        }, o.prototype.createStackBarGraph = function (o, t, a, e) {
var r = {
bars: {
show: !0,
        barWidth: .1,
        fill: 1
        },
        grid: {
        show: !0,
                aboveData: !1,
                labelMargin: 5,
                axisMargin: 0,
                borderWidth: 1,
                minBorderMargin: 5,
                clickable: !0,
                hoverable: !0,
                autoHighlight: !1,
                mouseActiveRadius: 20,
                borderColor: "#f5f5f5"
        },
        series: {
        stack: 0
        },
        legend: {
        position: "ne",
                margin: [0, - 32],
                noColumns: 0,
                labelBoxBorderColor: null,
                labelFormatter: function (o, t) {
                return o + "&nbsp;&nbsp;"
                },
                width: 30,
                height: 2
        },
        yaxis: t.y,
        xaxis: t.x,
        colors: a,
        tooltip: !0,
        tooltipOpts: {
        content: "%s : %y.0",
                shifts: {
                x: - 30,
                        y: - 50
                }
        }
};
d.plot(d(o), e, r)
        }, o.prototype.init = function () {
this.createPlotGraph("#orders_total", [
<?php
$order_total_mont_1 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-01-01 00:00:00", date("Y") . "-01-" . date("t", strtotime(date("Y") . "-01-01")) . " 23:59:59"]
        )->whereIn("status", [0, 1, 2, 3])->get());
$order_total_mont_2 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-02-01 00:00:00", date("Y") . "-02-" . date("t", strtotime(date("Y") . "-02-01")) . " 23:59:59"]
        )->whereIn("status", [0, 1, 2, 3])->get());
$order_total_mont_3 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-03-01 00:00:00", date("Y") . "-03-" . date("t", strtotime(date("Y") . "-03-01")) . " 23:59:59"]
        )->whereIn("status", [0, 1, 2, 3])->get());
$order_total_mont_4 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-04-01 00:00:00", date("Y") . "-04-" . date("t", strtotime(date("Y") . "-04-01")) . " 23:59:59"]
        )->whereIn("status", [0, 1, 2, 3])->get());
$order_total_mont_5 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-05-01 00:00:00", date("Y") . "-05-" . date("t", strtotime(date("Y") . "-05-01")) . " 23:59:59"]
        )->whereIn("status", [0, 1, 2, 3])->get());
$order_total_mont_6 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-06-01 00:00:00", date("Y") . "-06-" . date("t", strtotime(date("Y") . "-06-01")) . " 23:59:59"]
        )->whereIn("status", [0, 1, 2, 3])->get());
$order_total_mont_7 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-07-01 00:00:00", date("Y") . "-07-" . date("t", strtotime(date("Y") . "-07-01")) . " 23:59:59"]
        )->whereIn("status", [0, 1, 2, 3])->get());
$order_total_mont_8 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-08-01 00:00:00", date("Y") . "-08-" . date("t", strtotime(date("Y") . "-08-01")) . " 23:59:59"]
        )->whereIn("status", [0, 1, 2, 3])->get());
$order_total_mont_9 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-09-01 00:00:00", date("Y") . "-09-" . date("t", strtotime(date("Y") . "-09-01")) . " 23:59:59"]
        )->whereIn("status", [0, 1, 2, 3])->get());
$order_total_mont_10 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-10-01 00:00:00", date("Y") . "-10-" . date("t", strtotime(date("Y") . "-10-01")) . " 23:59:59"]
        )->whereIn("status", [0, 1, 2, 3])->get());
$order_total_mont_11 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-11-01 00:00:00", date("Y") . "-11-" . date("t", strtotime(date("Y") . "-11-01")) . " 23:59:59"]
        )->whereIn("status", [0, 1, 2, 3])->get());
$order_total_mont_12 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-12-01 00:00:00", date("Y") . "-12-" . date("t", strtotime(date("Y") . "-12-01")) . " 23:59:59"]
        )->whereIn("status", [0, 1, 2, 3])->get());
?>
[1, {{$order_total_mont_1}}],
        [2, {{$order_total_mont_2}}],
        [3, {{$order_total_mont_3}}],
        [4, {{$order_total_mont_4}}],
        [5, {{$order_total_mont_5}}],
        [6, {{$order_total_mont_6}}],
        [7, {{$order_total_mont_7}}],
        [8, {{$order_total_mont_8}}],
        [9, {{$order_total_mont_9}}],
        [10, {{$order_total_mont_10}}],
        [11, {{$order_total_mont_11}}],
        [12, {{$order_total_mont_12}}]
        ], [], ["Tổng"], ["#4fc6e1", "#6658dd"], "#f5f5f5", "#fff");
//chart 2
<?php
$order_none_mont_1 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-01-01 00:00:00", date("Y") . "-01-" . date("t", strtotime(date("Y") . "-01-01")) . " 23:59:59"]
        )->where("status", 0)->get());
$order_confirm_mont_1 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-01-01 00:00:00", date("Y") . "-01-" . date("t", strtotime(date("Y") . "-01-01")) . " 23:59:59"]
        )->where("status", 1)->get());
$order_success_mont_1 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-01-01 00:00:00", date("Y") . "-01-" . date("t", strtotime(date("Y") . "-01-01")) . " 23:59:59"]
        )->where("status", 2)->get());
$order_cancel_mont_1 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-01-01 00:00:00", date("Y") . "-01-" . date("t", strtotime(date("Y") . "-01-01")) . " 23:59:59"]
        )->where("status", 3)->get());


$order_none_mont_2 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-02-01 00:00:00", date("Y") . "-02-" . date("t", strtotime(date("Y") . "-02-01")) . " 23:59:59"]
        )->where("status", 0)->get());
$order_confirm_mont_2 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-02-01 00:00:00", date("Y") . "-02-" . date("t", strtotime(date("Y") . "-02-01")) . " 23:59:59"]
        )->where("status", 1)->get());
$order_success_mont_2 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-02-01 00:00:00", date("Y") . "-02-" . date("t", strtotime(date("Y") . "-02-01")) . " 23:59:59"]
        )->where("status", 2)->get());
$order_cancel_mont_2 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-02-01 00:00:00", date("Y") . "-02-" . date("t", strtotime(date("Y") . "-02-01")) . " 23:59:59"]
        )->where("status", 3)->get());


$order_none_mont_3 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-03-01 00:00:00", date("Y") . "-03-" . date("t", strtotime(date("Y") . "-03-01")) . " 23:59:59"]
        )->where("status", 0)->get());
$order_confirm_mont_3 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-03-01 00:00:00", date("Y") . "-03-" . date("t", strtotime(date("Y") . "-03-01")) . " 23:59:59"]
        )->where("status", 1)->get());
$order_success_mont_3 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-03-01 00:00:00", date("Y") . "-03-" . date("t", strtotime(date("Y") . "-03-01")) . " 23:59:59"]
        )->where("status", 2)->get());
$order_cancel_mont_3 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-03-01 00:00:00", date("Y") . "-03-" . date("t", strtotime(date("Y") . "-03-01")) . " 23:59:59"]
        )->where("status", 3)->get());

$order_none_mont_4 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-04-01 00:00:00", date("Y") . "-04-" . date("t", strtotime(date("Y") . "-04-01")) . " 23:59:59"]
        )->where("status", 0)->get());
$order_confirm_mont_4 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-04-01 00:00:00", date("Y") . "-04-" . date("t", strtotime(date("Y") . "-04-01")) . " 23:59:59"]
        )->where("status", 1)->get());
$order_success_mont_4 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-04-01 00:00:00", date("Y") . "-04-" . date("t", strtotime(date("Y") . "-04-01")) . " 23:59:59"]
        )->where("status", 2)->get());
$order_cancel_mont_4 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-04-01 00:00:00", date("Y") . "-04-" . date("t", strtotime(date("Y") . "-04-01")) . " 23:59:59"]
        )->where("status", 3)->get());

$order_none_mont_5 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-05-01 00:00:00", date("Y") . "-05-" . date("t", strtotime(date("Y") . "-05-01")) . " 23:59:59"]
        )->where("status", 0)->get());
$order_confirm_mont_5 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-05-01 00:00:00", date("Y") . "-05-" . date("t", strtotime(date("Y") . "-05-01")) . " 23:59:59"]
        )->where("status", 1)->get());
$order_success_mont_5 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-05-01 00:00:00", date("Y") . "-05-" . date("t", strtotime(date("Y") . "-05-01")) . " 23:59:59"]
        )->where("status", 2)->get());
$order_cancel_mont_5 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-05-01 00:00:00", date("Y") . "-05-" . date("t", strtotime(date("Y") . "-05-01")) . " 23:59:59"]
        )->where("status", 3)->get());


$order_none_mont_6 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-06-01 00:00:00", date("Y") . "-06-" . date("t", strtotime(date("Y") . "-06-01")) . " 23:59:59"]
        )->where("status", 0)->get());
$order_confirm_mont_6 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-06-01 00:00:00", date("Y") . "-06-" . date("t", strtotime(date("Y") . "-06-01")) . " 23:59:59"]
        )->where("status", 1)->get());
$order_success_mont_6 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-06-01 00:00:00", date("Y") . "-06-" . date("t", strtotime(date("Y") . "-06-01")) . " 23:59:59"]
        )->where("status", 2)->get());
$order_cancel_mont_6 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-06-01 00:00:00", date("Y") . "-06-" . date("t", strtotime(date("Y") . "-06-01")) . " 23:59:59"]
        )->where("status", 3)->get());

$order_none_mont_7 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-07-01 00:00:00", date("Y") . "-07-" . date("t", strtotime(date("Y") . "-07-01")) . " 23:59:59"]
        )->where("status", 0)->get());
$order_confirm_mont_7 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-07-01 00:00:00", date("Y") . "-07-" . date("t", strtotime(date("Y") . "-07-01")) . " 23:59:59"]
        )->where("status", 1)->get());
$order_success_mont_7 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-07-01 00:00:00", date("Y") . "-07-" . date("t", strtotime(date("Y") . "-07-01")) . " 23:59:59"]
        )->where("status", 2)->get());
$order_cancel_mont_7 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-07-01 00:00:00", date("Y") . "-07-" . date("t", strtotime(date("Y") . "-07-01")) . " 23:59:59"]
        )->where("status", 3)->get());

$order_none_mont_8 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-08-01 00:00:00", date("Y") . "-08-" . date("t", strtotime(date("Y") . "-08-01")) . " 23:59:59"]
        )->where("status", 0)->get());
$order_confirm_mont_8 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-08-01 00:00:00", date("Y") . "-08-" . date("t", strtotime(date("Y") . "-08-01")) . " 23:59:59"]
        )->where("status", 1)->get());
$order_success_mont_8 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-08-01 00:00:00", date("Y") . "-08-" . date("t", strtotime(date("Y") . "-08-01")) . " 23:59:59"]
        )->where("status", 2)->get());
$order_cancel_mont_8 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-08-01 00:00:00", date("Y") . "-08-" . date("t", strtotime(date("Y") . "-08-01")) . " 23:59:59"]
        )->where("status", 3)->get());

$order_none_mont_9 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-09-01 00:00:00", date("Y") . "-09-" . date("t", strtotime(date("Y") . "-09-01")) . " 23:59:59"]
        )->where("status", 0)->get());
$order_confirm_mont_9 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-09-01 00:00:00", date("Y") . "-09-" . date("t", strtotime(date("Y") . "-09-01")) . " 23:59:59"]
        )->where("status", 1)->get());
$order_success_mont_9 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-09-01 00:00:00", date("Y") . "-09-" . date("t", strtotime(date("Y") . "-09-01")) . " 23:59:59"]
        )->where("status", 2)->get());
$order_cancel_mont_9 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-09-01 00:00:00", date("Y") . "-09-" . date("t", strtotime(date("Y") . "-09-01")) . " 23:59:59"]
        )->where("status", 3)->get());


$order_none_mont_10 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-10-01 00:00:00", date("Y") . "-10-" . date("t", strtotime(date("Y") . "-10-01")) . " 23:59:59"]
        )->where("status", 0)->get());
$order_confirm_mont_10 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-10-01 00:00:00", date("Y") . "-10-" . date("t", strtotime(date("Y") . "-10-01")) . " 23:59:59"]
        )->where("status", 1)->get());
$order_success_mont_10 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-10-01 00:00:00", date("Y") . "-10-" . date("t", strtotime(date("Y") . "-10-01")) . " 23:59:59"]
        )->where("status", 2)->get());
$order_cancel_mont_10 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-10-01 00:00:00", date("Y") . "-10-" . date("t", strtotime(date("Y") . "-10-01")) . " 23:59:59"]
        )->where("status", 3)->get());


$order_none_mont_11 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-11-01 00:00:00", date("Y") . "-11-" . date("t", strtotime(date("Y") . "-11-01")) . " 23:59:59"]
        )->where("status", 0)->get());
$order_confirm_mont_11 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-11-01 00:00:00", date("Y") . "-11-" . date("t", strtotime(date("Y") . "-11-01")) . " 23:59:59"]
        )->where("status", 1)->get());
$order_success_mont_11 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-11-01 00:00:00", date("Y") . "-11-" . date("t", strtotime(date("Y") . "-11-01")) . " 23:59:59"]
        )->where("status", 2)->get());
$order_cancel_mont_11 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-11-01 00:00:00", date("Y") . "-11-" . date("t", strtotime(date("Y") . "-11-01")) . " 23:59:59"]
        )->where("status", 3)->get());

$order_none_mont_12 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-12-01 00:00:00", date("Y") . "-12-" . date("t", strtotime(date("Y") . "-12-01")) . " 23:59:59"]
        )->where("status", 0)->get());
$order_confirm_mont_12 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-12-01 00:00:00", date("Y") . "-12-" . date("t", strtotime(date("Y") . "-12-01")) . " 23:59:59"]
        )->where("status", 1)->get());
$order_success_mont_12 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-12-01 00:00:00", date("Y") . "-12-" . date("t", strtotime(date("Y") . "-12-01")) . " 23:59:59"]
        )->where("status", 2)->get());
$order_cancel_mont_12 = count(DB::table("orders")->whereBetween("created_at",
                [date("Y") . "-12-01 00:00:00", date("Y") . "-12-" . date("t", strtotime(date("Y") . "-12-01")) . " 23:59:59"]
        )->where("status", 3)->get());
?>

var y = [], e = [], i = [], l = [], r;
//none
y.push([1, parseInt({{$order_none_mont_1}})]);
y.push([2, parseInt({{$order_none_mont_2}})]);
y.push([3, parseInt({{$order_none_mont_3}})]);
y.push([4, parseInt({{$order_none_mont_4}})]);
y.push([5, parseInt({{$order_none_mont_5}})]);
y.push([6, parseInt({{$order_none_mont_6}})]);
y.push([7, parseInt({{$order_none_mont_7}})]);
y.push([8, parseInt({{$order_none_mont_8}})]);
y.push([9, parseInt({{$order_none_mont_9}})]);
y.push([10, parseInt({{$order_none_mont_10}})]);
y.push([11, parseInt({{$order_none_mont_11}})]);
y.push([12, parseInt({{$order_none_mont_12}})]);
//confirm
e.push([1, parseInt({{$order_confirm_mont_1}})]);
e.push([2, parseInt({{$order_confirm_mont_2}})]);
e.push([3, parseInt({{$order_confirm_mont_3}})]);
e.push([4, parseInt({{$order_confirm_mont_4}})]);
e.push([5, parseInt({{$order_confirm_mont_5}})]);
e.push([6, parseInt({{$order_confirm_mont_6}})]);
e.push([7, parseInt({{$order_confirm_mont_7}})]);
e.push([8, parseInt({{$order_confirm_mont_8}})]);
e.push([9, parseInt({{$order_confirm_mont_9}})]);
e.push([10, parseInt({{$order_confirm_mont_10}})]);
e.push([11, parseInt({{$order_confirm_mont_11}})]);
e.push([12, parseInt({{$order_confirm_mont_12}})]);
//success
i.push([1, parseInt({{$order_success_mont_1}})]);
i.push([2, parseInt({{$order_success_mont_2}})]);
i.push([3, parseInt({{$order_success_mont_3}})]);
i.push([4, parseInt({{$order_success_mont_4}})]);
i.push([5, parseInt({{$order_success_mont_5}})]);
i.push([6, parseInt({{$order_success_mont_6}})]);
i.push([7, parseInt({{$order_success_mont_7}})]);
i.push([8, parseInt({{$order_success_mont_8}})]);
i.push([9, parseInt({{$order_success_mont_9}})]);
i.push([10, parseInt({{$order_success_mont_10}})]);
i.push([11, parseInt({{$order_success_mont_11}})]);
i.push([12, parseInt({{$order_success_mont_12}})]);
//cancel
l.push([1, parseInt({{$order_cancel_mont_1}})]);
l.push([2, parseInt({{$order_cancel_mont_2}})]);
l.push([3, parseInt({{$order_cancel_mont_3}})]);
l.push([4, parseInt({{$order_cancel_mont_4}})]);
l.push([5, parseInt({{$order_cancel_mont_5}})]);
l.push([6, parseInt({{$order_cancel_mont_6}})]);
l.push([7, parseInt({{$order_cancel_mont_7}})]);
l.push([8, parseInt({{$order_cancel_mont_8}})]);
l.push([9, parseInt({{$order_cancel_mont_9}})]);
l.push([10, parseInt({{$order_cancel_mont_10}})]);
l.push([11, parseInt({{$order_cancel_mont_11}})]);
l.push([12, parseInt({{$order_cancel_mont_12}})]);

var s = new Array;
s.push({
label: "Chưa xác nhận",
        data: y,
        bars: {
        order: 1
        }
}),
        s.push({
        label: "Đã xác nhận",
                data: e,
                bars: {
                order: 2
                }
        }), s.push({
label: "Đã thanh toán",
        data: i,
        bars: {
        order: 3
        }
}), s.push({
label: "Đã hủy",
        data: l,
        bars: {
        order: 4
        }
}), this.createStackBarGraph("#ordered-bars-chart", {
y: {
axisLabel: "Sales Value (USD)",
        tickColor: "#f5f5f5",
        font: {
        color: "#bdbdbd"
        }
},
        x: {
        axisLabel: "Last 10 Days",
                tickColor: "#f5f5f5",
                font: {
                color: "#bdbdbd"
                }
        }
}, ["#323a46", "#f7b84b", "#1abc9c", "#f1556c"], s);
}, d.FlotChart = new o, d.FlotChart.Constructor = o
}(window.jQuery),
        function (o) {
        "use strict";
        window.jQuery.FlotChart.init()
        }();
</script>
@endsection