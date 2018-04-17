<div class="menu-left">
  <div id="rib">Danh mục sản phẩm </div>
  <div class="" style="width:100%;">
    <ul class="list-group" id="menu" >
      {{-- one tag --}}
      @foreach ($category as $cate)
        <li  class="menu1" id="ribbon">
          <span class="font-text">{{$cate->categoryname}}</span>
        </li>
        <ul style="padding-left:10px">
          @foreach ($cate->detailcategory as $key)
            <a href="listdetailcategory/{{$key->id}}" class="ribbon-text font-text-body">{{$key->detailcategoryname}}</a>
          @endforeach
        </ul>
      @endforeach

    </ul>
  </div>

</div>
