<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Log;

class UserController extends Controller
{
    public function index()
    {
        return view('users.list');
    }

    // public function getUsers(Request $request)
    // {
    //     $columns = ['id', 'name', 'email', 'created_at'];

    //     $totalData = User::count();
    //     $totalFiltered = $totalData;

    //     $limit = $request->input('length');
    //     $start = $request->input('start');
    //     $order = $columns[$request->input('order.0.column')];
    //     $dir = $request->input('order.0.dir');

    //     if(empty($request->input('search.value')))
    //     {
    //         $users = User::offset($start)
    //                     ->limit($limit)
    //                     ->orderBy($order, $dir)
    //                     ->get();
    //     }
    //     else {
    //         $search = $request->input('search.value'); 

    //         $users =  User::where('name','LIKE',"%{$search}%")
    //                         ->orWhere('email', 'LIKE',"%{$search}%")
    //                         ->offset($start)
    //                         ->limit($limit)
    //                         ->orderBy($order,$dir)
    //                         ->get();

    //         $totalFiltered = User::where('name','LIKE',"%{$search}%")
    //                         ->orWhere('email', 'LIKE',"%{$search}%")
    //                         ->count();
    //     }
        

    //     $data = array();
    //     if(!empty($users))
    //     {
    //         foreach ($users as $user)
    //         {
    //             $nestedData['id'] = $user->id;
    //             $nestedData['name'] = $user->name;
    //             $nestedData['email'] = $user->email;
    //             $nestedData['created_at'] = date('j M Y h:i a',strtotime($user->created_at));
    //             $nestedData['action'] = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                
    //             $data[] = $nestedData;
    //         }
    //     }

    //     $json_data = array(
    //         "draw"            => intval($request->input('draw')),  
    //         "recordsTotal"    => intval($totalData),  
    //         "recordsFiltered" => intval($totalFiltered), 
    //         "data"            => $data   
    //     );

    //     return response()->json($json_data); 
    // }

   // another
    // public function getUsers(Request $request)
    // {
    //     $columns = ['id', 'name', 'email', 'created_at'];

    //     $totalData = User::count();
    //     $totalFiltered = $totalData;

    //     $limit = $request->input('length');
    //     $start = $request->input('start');
    //     $order = $columns[$request->input('order.0.column')];
    //     $dir = $request->input('order.0.dir');

    //     $query = User::query();

    //     // Adding filters
    //     if ($request->has('name') && !empty($request->input('name'))) {
    //         $query->where('name', 'LIKE', "%" . $request->input('name') . "%");
    //     }

    //     if ($request->has('email') && !empty($request->input('email'))) {
    //         $query->where('email', 'LIKE', "%" . $request->input('email') . "%");
    //     }

    //     if ($request->has('created_at') && !empty($request->input('created_at'))) {
    //         $query->whereDate('created_at', $request->input('created_at'));
    //     }

    //     if (empty($request->input('search.value'))) {
    //         $users = $query->offset($start)
    //                        ->limit($limit)
    //                        ->orderBy($order, $dir)
    //                        ->get();
    //     } else {
    //         $search = $request->input('search.value');

    //         $users = $query->where(function($query) use ($search) {
    //                     $query->where('name', 'LIKE', "%{$search}%")
    //                           ->orWhere('email', 'LIKE', "%{$search}%");
    //                 })
    //                 ->offset($start)
    //                 ->limit($limit)
    //                 ->orderBy($order, $dir)
    //                 ->get();

    //         $totalFiltered = $query->where(function($query) use ($search) {
    //                             $query->where('name', 'LIKE', "%{$search}%")
    //                                   ->orWhere('email', 'LIKE', "%{$search}%");
    //                         })->count();
    //     }

    //     $data = array();
    //     if (!empty($users)) {
    //         foreach ($users as $user) {
    //             $nestedData['id'] = $user->id;
    //             $nestedData['name'] = $user->name;
    //             $nestedData['email'] = $user->email;
    //             $nestedData['created_at'] = date('j M Y h:i a', strtotime($user->created_at));
    //             $nestedData['action'] = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';

    //             $data[] = $nestedData;
    //         }
    //     }

    //     $json_data = array(
    //         "draw"            => intval($request->input('draw')),
    //         "recordsTotal"    => intval($totalData),
    //         "recordsFiltered" => intval($totalFiltered),
    //         "data"            => $data
    //     );

    //     return response()->json($json_data);
    // }

//     //Final data table query
//     public function getUsers(Request $request)
// {
//     $columns = ['id', 'name', 'email', 'created_at'];

//     // $totalData = User::count();
//     // $totalFiltered = $totalData;

//     $limit = $request->input('length');
//     $start = $request->input('start');
//     $order = $columns[$request->input('order.0.column')];
//     $dir = $request->input('order.0.dir');

//     $query = User::query();

//     // Adding filters
//     if ($request->has('name') && !empty($request->input('name'))) {
//         $query->where('name', 'LIKE', "%" . $request->input('name') . "%");
//     }

//     if ($request->has('email') && !empty($request->input('email'))) {
//         $query->where('email', 'LIKE', "%" . $request->input('email') . "%");
//     }

//     if ($request->has('created_at') && !empty($request->input('created_at'))) {
//         $query->whereDate('created_at', $request->input('created_at'));
//     }



//     else {
//         $search = $request->input('search.value');

//         $users = $query->where(function($query) use ($search) {
//                     $query->where('name', 'LIKE', "%{$search}%")
//                           ->orWhere('email', 'LIKE', "%{$search}%");
//                 })
//                 ->offset($start)
//                 ->limit($limit)
//                 ->orderBy($order, $dir)
//                 ->get();

//         $totalData = User::count();
//         $totalFiltered = $query->count();
            
//         $users = $query->offset($start)
//                       ->limit($limit)
//                       ->orderBy($order, $dir)
//                       ->get();

//         $totalFiltered = $query->where(function($query) use ($search) {
//                             $query->where('name', 'LIKE', "%{$search}%")
//                                   ->orWhere('email', 'LIKE', "%{$search}%");
//                         })->count();
//     }

//     $data = array();
//     if (!empty($users)) {
//         foreach ($users as $user) {
//             $nestedData['id'] = $user->id;
//             $nestedData['name'] = $user->name;
//             $nestedData['email'] = $user->email;
//             $nestedData['created_at'] = date('j M Y h:i a', strtotime($user->created_at));
//             $nestedData['action'] = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
           

//             $data[] = $nestedData;
//         }
//     }

//     $json_data = array(
//         "draw"            => intval($request->input('draw')),
//         "recordsTotal"    => intval($totalData),
//         "recordsFiltered" => intval($totalFiltered),
//         "data"            => $data
//     );

//     return response()->json($json_data);
// }


// public function edit($id)
// {
//     $user = User::findOrFail($id);
//     return response()->json($user);
// }

// public function update(Request $request, $id)
// {
//     $user = User::findOrFail($id);
//     $user->update($request->all());
//     return response()->json(['success' => 'User updated successfully.']);
// }

//test last data table
public function getUsers(Request $request)
{
    $columns = ['id', 'name', 'email', 'created_at'];

    $limit = $request->input('length',10);
    $start = $request->input('start',0);
    //$order = $columns[$request->input('order.0.column')];
    //$dir = $request->input('order.0.dir');
     // Validate order column index
     $orderColumnIndex = $request->input('order.0.column', 0); // default to 0 if not provided
     if (!is_numeric($orderColumnIndex) || $orderColumnIndex < 0 || $orderColumnIndex >= count($columns)) {
         $orderColumnIndex = 0; // default to the first column if validation fails
     }
     $order = $columns[$orderColumnIndex];
 
     // Validate order direction
     $dir = $request->input('order.0.dir', 'asc'); // default to 'asc' if not provided
     if (!in_array($dir, ['asc', 'desc'])) {
         $dir = 'asc'; // default to 'asc' if validation fails
     }

    $query = User::query();



    // Adding filters
    if ($request->has('name') && !empty($request->input('name'))) {
        $query->where('name', 'LIKE', "%" . $request->input('name') . "%");
    }

    if ($request->has('email') && !empty($request->input('email'))) {
        $query->where('email', 'LIKE', "%" . $request->input('email') . "%");
    }

    if ($request->has('created_at') && !empty($request->input('created_at'))) {
        $query->whereDate('created_at', $request->input('created_at'));
    }

    $search = $request->input('search.value');

    if (!empty($search)) {
        $query->where(function($q) use ($search) {
            $q->where('name', 'LIKE', "%{$search}%")
             ->orWhere('email', 'LIKE', "%{$search}%");
        });
    }

    // Log the generated SQL query
    // Log::info('SQL Query: ' . $query->toSql());
    // \Log::info('Query Bindings: ' . json_encode($query->getBindings()));

    $totalData = User::count();
    $totalFiltered = $query->count();

    $users = $query->offset($start)
                  ->limit($limit)
                  ->orderBy($order, $dir)
                  ->get();

    // Debugging
    // dd($query->toSql(), $query->getBindings());
    // Log the retrieved users
    // \Log::info('Retrieved Users: ' . $users->toJson());

    $data = array();
    if (!empty($users)) {
        foreach ($users as $user) {
            $nestedData['id'] = $user->id;
            $nestedData['name'] = $user->name;
            $nestedData['email'] = $user->email;
            $nestedData['created_at'] = date('j M Y h:i a', strtotime($user->created_at));
            //$nestedData['action'] = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
            $nestedData['action'] = '  <button type="button"  class="btn btn-sm btn-primary editfrom" data-id="{{ $row->id }}"  data-toggle="modal" data-target="#exampleModal1">Edit
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <span class="btn btn-sm  btn-danger">Delete<i class="fas fa-trash"></i></span>';

            $data[] = $nestedData;
        }
    }

    $json_data = array(
        "draw"            => intval($request->input('draw')),
        "recordsTotal"    => intval($totalData),
        "recordsFiltered" => intval($totalFiltered),
        "data"            => $data
    );

    return response()->json($json_data);
}

// public function ExportExcel()
// {
//     return Excel::download(new UsersExport, 'users.xlsx');
// }



     
}
