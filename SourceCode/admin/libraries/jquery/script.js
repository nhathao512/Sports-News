$(document).ready(function() {
	$("#addUser").validate({
		ignore: [], 
		debug: false,
		rules: {
			username: {
				required: true,
				minlength: 3,
				maxlength: 32,
			},
			password: {
				required: true,
				minlength: 6,
			},
			re_password: {
				required: true,
				equalTo: "#password",
			},
			fullname: {
				required: true,
			},
		},
		messages: {
			username: {
				required: "Vui lòng nhập Username",
				minlength: "Tên đăng nhập phải có ít nhất 3 ký tự",
				maxlength: "Tên đăng nhập tối đa 32 ký tự",
			},
			password: {
				required: "Vui lòng nhập Mật khẩu",
				minlength: "Mật khẩu phải có ít nhất 6 ký tự",
			},
			re_password: {
				required: "Vui lòng nhập lại Mật khẩu giống dòng trên",
				equalTo: "Bạn phải nhập mật khẩu khớp với dòng trên",
				
			},
			fullname: {
				required: "Bạn không được để trống",
			},
		}
	});
	
	$("#editUser").validate({
		ignore: [], 
		debug: false,
		rules: {
			username: {
				required: true,
				minlength: 3,
				maxlength: 32,
			},
			fullname: {
				required: true,
			},
		},
		messages: {
			username: {
				required: "Vui lòng nhập Username",
				minlength: "Tên đăng nhập phải có ít nhất 3 ký tự",
				maxlength: "Tên đăng nhập tối đa 32 ký tự",
			},
			fullname: {
				required: "Bạn không được để trống",
			},
		}
	});
	
	$("#editCat").validate({
		ignore: [], 
		debug: false,
		rules: {
			ten: {
				required: true,
				minlength: 3,
				maxlength: 100,
			},
		},
		messages: {
			ten: {
				required: "Vui lòng nhập Tên danh mục tin",
				minlength: "Tên đăng nhập phải có ít nhất 3 ký tự",
				maxlength: "Tên đăng nhập tối đa 100 ký tự",
			},
		}
	});
	
	$("#addCat").validate({
		ignore: [], 
		debug: false,
		rules: {
			ten: {
				required: true,
				minlength: 3,
				maxlength: 100,
			},
		},
		messages: {
			ten: {
				required: "Vui lòng nhập Tên danh mục tin",
				minlength: "Tên đăng nhập phải có ít nhất 3 ký tự",
				maxlength: "Tên đăng nhập tối đa 100 ký tự",
			},
		}
	});
}
);
