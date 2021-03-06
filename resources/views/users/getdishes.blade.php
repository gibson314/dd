@extends('layouts.usermaster')
@section('content')

    <h1>我的菜谱</h1>
    <hr style=" height:2px;border:none;border-top:2px dotted #185598;" />
    @foreach($dishes as $dish)
        <div class="Empty">
            <p></br></p>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span4">
                    <a href="{{ url('/dishes',$dish->id) }}"><img style="vertical-align:middle;" src="{{$dish->TitleImg}}"/></a>
                </div>
                <div class="span8">
                    <table valign="middle"  align="left" class="table table-hover" contenteditable="false">
                        <tbody>
                        <tr>
                            <th scope="row" width="25%">
                                <ul>
                                    <li>菜品名称</li>
                                </ul>
                            </th>
                            <td><a href="{{ url('/dishes',$dish->id) }}">{{$dish->name}}</a></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <ul>
                                    <li>上传用户</li>
                                </ul>
                            </th>
                            <?php $author=\App\User::where('id',$dish->authorid)->first();?>
                            <td><a href="{{ url('author',$dish->authorid) }}">{{$author->username}}</a> </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <ul>
                                    <li>上传时间</li>
                                </ul>
                            </th>
                            <td>发表于{{$dish->publish_date}}<br></td>
                        </tr>
                        <tr>
                            <th colspan="1" scope="row">
                                <ul>
                                    <li>菜品简介</li>
                                </ul>
                            </th>
                            <td>{{$dish->intro}}<br></td>
                        </tr>
                        <tr>
                            <th colspan="1" scope="row">
                                <ul>
                                    <li>操作</li>
                                </ul>
                            </th>

                            <td>{!! link_to_route('dishes.edit', '编辑', $dish->id) !!}</td>


                            <form action="{{ URL('dishes/dele') }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="delid" value="{{$dish->id}}">
                                <button class="btn btn-sm btn-info">删除</button>
                            </form>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr style=" height:2px;border:none;border-top:2px dotted #185598;" />
        </div>
    @endforeach

    <div class="container" style="text-align: right">
        <a href="{{ url('/dishes/create') }}">+添加新菜谱</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{ url('/users/profile') }}">返回个人中心</a>
    </div>
@endsection
