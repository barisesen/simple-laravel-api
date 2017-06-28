# Simple Token based api

Token kullanılarak yapılmış basit bir api örneğidir. Her yapılan istekte parametre olarak api_token gönderilmelidir.
Parametlere olarak göndermek yerine headerda

Authorization:Bearer api_token

Şeklinde kullanılabilir.

Kullanıcı giriş ve kayıttan sonra api_token döner.

## Getting with ajax

### Login 

	$.ajax({
	    url      : 'http://token-api.dev/api/user/login',
	    type     : "POST",
	    data     : "email=iletisim@barisesen.com&password=password",
	    headers: {
	        'Accept':'application/json'
	    },
	    dataType : 'json',
	    success  : function (resp) {
	      console.log(resp);
	    }
	  });

### Register 

	$.ajax({
	    url      : 'http://token-api.dev/api/user/login',
	    type     : "POST",
	    data     : "name=baris&email=iletisim@barisesen.com&password=password",
	    headers: {
	        'Accept':'application/json'
	    },
	    dataType : 'json',
	    success  : function (resp) {
	      console.log(resp);
	    }
	  });


### Add New Note

	$.ajax({
	    url      : 'http://token-api.dev/api/notes',
	    type     : "POST",
	    data     : "api_token=gFbAfiphLKzlz13wPHK89ezTsn446BSbzS2ZTId5v11ViKkdvw7ZK4sqrEhld&body=api test",
	    headers: {
	        'Accept':'application/json'
	    },
	    dataType : 'json',
	    success  : function (resp) {
	      console.log(resp);
	    }
	  });


### list All Notes


	$.ajax({
	    url      : 'http://token-api.dev/api/notes?api_token=gFbAfiphLKzlz13wPHK89ezTsn446BSbzS2ZTId5v11ViKkdvw7ZK4sqrEhld',
	    type     : "GET",
	    headers: {
	        'Accept':'application/json'
	    },
	    dataType : 'json',
	    success  : function (resp) {
	      console.log(resp);
	    }
	  });


### list Only my Notes


	$.ajax({
	    url      : 'http://token-api.dev/api/user/notes?api_token=gFbAfiphLKzlz13wPHK89ezTsn446BSbzS2ZTId5v1ViKkdvw7ZK4sqrEhld',
	    type     : "GET",
	    headers: {
	        'Accept':'application/json'
	    },
	    dataType : 'json',
	    success  : function (resp) {
	      console.log(resp);
	    }
	  });


### Show Note


	$.ajax({
	    url      : 'http://token-api.dev/api/notes/**:id**?api_token=gFbAfiphLKzlz13wPHK89ezTsn446BSbzS2ZTId5v1ViKkdvw7ZK4sqrEhld',
	    type     : "GET",
	    headers: {
	        'Accept':'application/json'
	    },
	    dataType : 'json',
	    success  : function (resp) {
	      console.log(resp);
	    }
	  });


### Delete My Note


	$.ajax({
	    url      : 'http://token-api.dev/api/notes/**:id**',
	    type     : "Delete",
	    data 	 : "api_token=gFbAfiphLKzlz13wPHK89ezTsn446BSbzS2ZTId5v11ViKkdvw7ZK4sqrEhld",
	    headers: {
	        'Accept':'application/json'
	    },
	    dataType : 'json',
	    success  : function (resp) {
	      console.log(resp);
	    }
	  });

### Update My Note


	$.ajax({
	    url      : 'http://token-api.dev/api/notes/**:id**',
	    type     : "PATCH",
	    data 	 : "api_token=gFbAfiphLKzlz13wPHK89ezTsn446BSbzS2ZTId5v11ViKkdvw7ZK4sqrEhld&body=updated post test",
	    headers: {
	        'Accept':'application/json'
	    },
	    dataType : 'json',
	    success  : function (resp) {
	      console.log(resp);
	    }
	  });

