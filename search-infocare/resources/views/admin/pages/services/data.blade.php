<thead>
    <tr>
      <th>Tên dịch vụ</th>
      <th>Mô tả</th>
      <th>Đường dẫn</th>
      <th>Hành động</th>
    </tr>
    </thead>
    <tbody id="listSearch">
    @foreach($services_list as $services_list)
    <tr>
      <td>{{$services_list->services_name}}</td>
      <td>{{$services_list->services_description}}</td>
      <td>{{$services_list->services_slug}}</td>
      <td>
        <button onclick="idEdit('{{$services_list->services_name}}','{{$services_list->services_description}}','{{$services_list->services_slug}}',{{$services_list->id}})"
          type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit">
          <i class="fas fa-edit"></i>
        </button>
        <button type="button" class="btn btn-danger" id="btn-delete"
                            data-url="{{route('service-delete')."/".$services_list->id}}">
                              <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
      </td>
    </tr>
    @endforeach
      </tbody>