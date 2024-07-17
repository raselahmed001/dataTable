<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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

//     $totalData = User::count();
//     $totalFiltered = $query->count();

//     $users = $query->offset($start)
//                    ->limit($limit)
//                    ->orderBy($order, $dir)
//                    ->get();

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

// //     return response()->json($json_data);
// // }

// /////////////////
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

     
}
