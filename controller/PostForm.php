<?php
require_once '../model/ErrorHandle.php';
require_once '../request/request.php';
require_once '../session/Session.php';

// 値を判定し、処理ルートを振り分ける役割
class PostForm
{
    private $errorHandle;
    private $request;
    private $session;

    public function __construct(request $request, ErrorHandle $errorHandle = null, Session $session = null)
    {
        $this->request = $request;
        $this->errorHandle = $errorHandle ?? new ErrorHandle();
        $this->session = $session ?? new Session();
    }

    public function execute()
    {
        $postData = $this->request->getPostData();

        if (! $this->getValidateResult($postData)) {
            header('Location: http://localhost/view/TestValue.php');
        } else {
            $this->session->sessionUnset();
            $this->session->setFlash('validate', $this->getValidateResult($postData));
            header('Location: http://localhost/view/TestForm.php');
        }
    }

    private function getValidateResult(array $postData)
    {
        return $this->errorHandle->handle($postData);
    }
}
