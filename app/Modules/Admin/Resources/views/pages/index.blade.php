@extends('admin::layouts.master')

@section('content')

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-title">
                                    <h3>Responsive Table</h3>
                                </div>
                                <div class="box-body table-responsive no-padding">
                                     <table class="table table-hover table-striped">
									  <thead>
										  <tr>
											  <th>Username</th>
											  <th>Date registered</th>
											  <th>Role</th>
											  <th>Status</th>
											  <th>Actions</th>
										  </tr>
									  </thead>   
									  <tbody>
										<tr>
											<td>John Doe</td>
											<td>2014/06/16</td>
											<td>Member</td>
											<td>
												<span class="label label-success">Active</span>
											</td>
											<td>
												<a class="btn btn-success btn-sm" href="table.html#">
													<i class="fa fa-search-plus "></i>  
												</a>
												<a class="btn btn-info btn-sm" href="table.html#">
													<i class="fa fa-edit "></i>  
												</a>
												<a class="btn btn-danger btn-sm" href="table.html#">
													<i class="fa fa-trash-o "></i> 
												</a>
											</td>
										</tr>
										<tr>
											<td>John Doe</td>
											<td>2014/06/16</td>
											<td>Member</td>
											<td>
												<span class="label label-success">Active</span>
											</td>
											<td>
												<a class="btn btn-success btn-sm" href="table.html#">
													<i class="fa fa-search-plus "></i>  
												</a>
												<a class="btn btn-info btn-sm" href="table.html#">
													<i class="fa fa-edit "></i>  
												</a>
												<a class="btn btn-danger btn-sm" href="table.html#">
													<i class="fa fa-trash-o "></i> 
												</a>
											</td>
										</tr>
										<tr>
											<td>John Doe</td>
											<td>2014/06/16</td>
											<td>Member</td>
											<td>
												<span class="label label-warning">Pending</span>
											</td>
											<td>
												<a class="btn btn-success btn-sm" href="table.html#">
													<i class="fa fa-search-plus "></i>                                            
												</a>
												<a class="btn btn-info btn-sm" href="table.html#">
													<i class="fa fa-edit "></i>                                            
												</a>
												<a class="btn btn-danger btn-sm" href="table.html#">
													<i class="fa fa-trash-o "></i> 

												</a>
											</td>
										</tr>
										<tr>
											<td>John Doe</td>
											<td>2014/06/16</td>
											<td>Member</td>
											<td>
												<span class="label label-warning">Pending</span>
											</td>
											<td>
												<a class="btn btn-success btn-sm" href="table.html#">
													<i class="fa fa-search-plus "></i>                                            
												</a>
												<a class="btn btn-info btn-sm" href="table.html#">
													<i class="fa fa-edit "></i>                                            
												</a>
												<a class="btn btn-danger btn-sm" href="table.html#">
													<i class="fa fa-trash-o "></i> 

												</a>
											</td>
										</tr>
									  </tbody>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

@stop