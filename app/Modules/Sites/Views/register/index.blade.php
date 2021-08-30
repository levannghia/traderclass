@extends('Sites::courseIntroduction')
@section('title', $row->title)
@section('content')
@include('Sites::inc.maketting')
<div class="main">
    <div class="container">
        <table>
            <tr class="sale">
                <td class="hide-title"></td>
                <td class="hide-title"></td>
                <td class="title-sale">THE BEST</td>
            </tr>
            <tr class="title-table">
                <th class="tb-left">YOU WILL HAVE</th>
                <th class="tb-cen cen">{{$teacher->fullname}} Course</th>
                <th class="tb-ri dif">One Year Unlimited Access</th>
            </tr>
            <tr class="body-table">
                <td class="tb-left">Topics & Lessons</td>
                <td class="txt cen">18 lessons</td>
                <td class="txt dif">Over 500 different themes</td>
            </tr>
            <tr class="body-table">
                <td class="tb-left">Workbook Materials + Learning On 5 Types of Devices </td>
                <td class="txt cen"><i class="fal fa-check"></i></td>
                <td class="txt dif"><i class="fal fa-check"></i></td>
            </tr>
            <tr class="body-table">
                <td class="tb-left">New Courses Added in the Future</td>
                <td class="txt cen"><i class="fal fa-times"></i></td>
                <td class="txt dif"><i class="fal fa-check"></i></td>
            </tr>
            <tr class="footer-table">
                <td></td>
                <td class="txt cen">
                    <p>2.000.000 ₫</p>
                    <h5>590.000 ₫</h5>
                    <h4 class="cous"><a style="color: white;" href="{{url('/log-into/course-selection/'.$teacher->id)}}">BUY COURSE</a></h4>
                </td>
                <td class="txt dif">
                    <p>4.000.000 ₫</p>
                    <h5>990.000 ₫</h5>
                    <h4 class="pac"><a style="color: white;" href="{{route('sites.logInto.index')}}">BUY ACCESS PACKAGE</a></h4>
                </td>
            </tr>
        </table>
        <div class="hotline-workingtimes row">
            <div class="col-md-6 worlef">
                <h4><i class="fal fa-phone-volume"></i>Need More Support?</h4>
            </div>
            <div class="col-md-6 worrig">
                <h5>Call us Monday - Friday 9:30am - 6pm</h5>
                <h4>0316 690 536</h4>
            </div>
        </div>
    </div>
</div>
@endsection