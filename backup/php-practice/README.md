# PHP

### php의 환경변수

---

-   `phpinfo()` 명령어를 통해 PHP 정보 확인 가능 → PHP Variables에서 환경 변수 확인 가능
-   `$_GET` : 파라미터로 넘긴 변수를 배열로 출력
    -   `print_r($_GET)` 으로 배열 확인 가능
    -   `$_GET['var']` 으로 접근

### 조건 분기문(IF)

---

```php
if() {
	...
} elseif() {
	...
}else {
	...
}
```

### 반복문(FOR)

---

```php
for(초기값; 조건; 증감값) {
	...
}
```

### 배열

---

```php
// 배열 생성
$a = array(1,2,3);
print_r($a);
echo $a[2];

// 배열을 생성하는 다른 방법
$a[] = 1;
$a[] = 2;
$a[] = 3;

// for-each 구문으로 배열 출력
foreach($a as $b) {
	echo $b;
}

foreach($a as $key=>$b) {
	echo "$key : $b <br> ";
```

-   다중 배열

```php
$list = array();

$data['name'] = "홍길동";
$data['memo'] = "문의드립니다";

$list[] = $data;
```

<aside>
💡 `<? echo $data['name'] ?>` → `<?=$data['name']?>` 축약 가능

</aside>

### 외부 파일 읽어오기

---

<aside>
💡 php는 파일을 배열로 읽는다

</aside>

> `explode(구분자, 문자열)` : 구분자를 기준으로 문자열을 잘라 배열을 반환

```php
$str = "안녕하세요,저의,이름은,서기입니다";
$arr = explode(",", $str);
// Array([0] => 안녕하세요 [1] => 저의 [2] => 이름은 [3] => 서기입니다.)
```

### 파일 사용

---

-   파일 열기 - `fopen(경로, mode)`
-   파일 읽기 - `fread(resource, length)`
-   파일 작성 - `fwrite(resource, string)`
-   파일 닫기 - `fclose(resource)`

### 다른 파일 삽입

---

> `include "file"` / `iclude("file")`: file을 삽입

> `include_once "file"` / `include_once("file")` : 전체 프로그램에서 file을 한 번 삽입

> `require "file"` / `require("file")` : include와 동일하나 더 엄격

> `require_once "file"` / `require_once("file")` : include_once와 동일하나 더 엄격

### 사용자 정의 함수

---

```php
function func($parameter) {
	// 함수 내용
	return $ret;
}
```

### namespace

---

: 여러 라이브러리를 사용하며 함수가 중복되는 것을 막을 때 namespace를 선언하고 명시하여 사용

```php
<?
	// first.php
	namespace first;

	function func() {
		return 10;
	}
?>

<?
	// second.php
	namespace second;

	function func() {
		return 20;
	}
?>

<?
	// main.php
	include "first.php";
	include "second.php";

	echo first\func();   // 10
	echo second\func();  // 20
?>
```

### 파일 업로드 처리

---

-   `$_FILES['name']` : 업로드된 파일을 관리
    ```php
    Array
    (
    	[name] => file_name.exe
    	[type] => file_type(application/x-msdownload
    	[tmp_name] => C:\xampp\tmp\~~
    	[error] => 0
    	[size] => file_size
    )
    ```
-   `move_uploaded_file($_FILES['name']['tmp_name'], $destination)` : 업로드된 파일을 다른 경로에 이동

### MySQL 접속

---

-   접속 및 접속 확인

```php
$connect = mysqli_connect("localhost", "user", "password", "db_name");

if(mysqli_connect_error()) {
	echo "접속 중 에러 발생";
	echo mysqli_connect_error();
}

print_r($connect);
```

-   쿼리 실행

```php
$connect = mysqli_connect("localhost", "user", "password", "db_name");
$query = "select * from table";

$result = mysqli_query($connect, $query); // Object 변환
$row = mysqli_fetch_array($result); //  row 하나를 배열로 반환

// 모든 row를 접근하여 해당 column 값 출력
while($row = mysqli_fetch_array($result)) {
	echo $row['column'];
}
```

### mysql_real_escape_string

---

`$str = mysql_real_secape_string($connect, $str);`

: SQL Injection을 방지하기 위해 문자열을 가공하는 함수

<aside>
💡 `nl2br($str)` : new line to br -  ‘\n’ 를 <br> 태그로 바꿔주는 함수

</aside>

<aside>
💡 `isset()` : 값이 존재하는지 확인하는 함수

</aside>

<aside>
💡 `array_key_exists($key, $array)` : 배열에 key가 존재하는지 확인하는 함수. 보통 파라미터 값을 확인하는 데에 사용

</aside>

### 암호화

---

-   DB 측에서 암호화
    -   `~~insert into Table(pwd) values(password(pwd))` - password() 함수로 감싸 암호화 진행~~ → MySQL 8 이후부터는 사용불가
    -   `insert into Table(pwd) values(md5('$pwd'))` → MD5로 암호화

### 로그인 구현

---

-   cookie 설정
    -   `setcookie($name)` : name 명의 쿠키 값 설정
-   session 설정
    -   `session_start()` : 세션 사용 시작

<aside>
💡 `Header("Location : destination.php")` : destination으로 페이지 이동 함수

</aside>

<aside>
💡 `trim($str)` : 문자열 공백 제거 함수

</aside>

### 클래스

---

-   클래스 선언과 생성

```php
// 클래스 선언
class className {

}

// 클래스 생성
$a = new className();
```

-   public 멤버 vs private 멤버

```php
class info {
	public $_name;
	private $_age;
}

$a = new info();

$a->_name = "홍길동";
echo $a->name; // 홍길동

$a->_age = 15; // 오류(private 멤버는 클래스 내부에서만 사용 가능 -> setter, getter 메소드로 접근)
```

<aside>
💡 내부 변수임을 표시하기 위해 언더바(_)를 변수명 앞에 붙임

</aside>

### Super-fast PHP MySQL Database Class

---

[Super-fast PHP MySQL Database Class](https://codeshack.io/super-fast-php-mysql-database-class/)

### 메일 발송 - SMTP

---

[https://github.com/PHPMailer/PHPMailer](https://github.com/PHPMailer/PHPMailer)

### 웹 크롤링

---

-   `simple_html_dom.php` download

[PHP Simple HTML DOM Parser Files](https://sourceforge.net/projects/simplehtmldom/files/)

-   `simple_html_dom.php` manual

[](https://simplehtmldom.sourceforge.io/)

-   초기 사용

```php
ini_set("allow_url_fopen", 1);
include "simple_html_dom.php";

$url = '크롤링 하고자 하는 url';
$data = file_get_html($url);
```

-   parsing

```php
foreach($data->find("태그.클래스명") as $d) {
	// 내용
}
```
