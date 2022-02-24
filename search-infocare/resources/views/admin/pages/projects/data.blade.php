<thead>
    <tr>
      <th>Công ty</th>
      <th>Tên dịch vụ</th>
      <th>Tên dự án</th>
      <th>Hành động</th>
    </tr>
    </thead>
    <tbody id="listSearch">
       
    @foreach($projects_list as $projects_list)
    <tr>
      <td>{{$projects_list->full_name}}</td>
      <td>{{$projects_list->services_name}}</td>
      <td>{{$projects_list->projects_name}}</td>
      <td>
        <button onclick="idEdit('{{$projects_list->full_name}}','{{$projects_list->services_name}}','{{$projects_list->projects_name}}',{{$projects_list->id}})"
          type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit">
          <i class="fas fa-edit"></i>
        </button>
        <button type="button" class="btn btn-danger" id="btn-delete"
        data-url="{{route('project-delete')."/".$projects_list->id}}">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
      </td>
    </tr>
    @endforeach
      </tbody>