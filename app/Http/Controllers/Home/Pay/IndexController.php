<?php

namespace App\Http\Controllers\Home\Pay;

use AlipayTradeWapPayRequest;
use AopClient;
use App\Common\Pay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index()
    {
        return view('pay.index');
    }

    public function WxPay()
    {
        $pay = new Pay();
        $pay->notify_url = 'http://share.xiongmaotaoxue.com/mobile/homework/index/wx-notify';
        $pay->redirect_url = 'http://share.xiongmaotaoxue.com/mobile/homework/index/index?user_id=30874&grade_id=2';
        $result =  $pay->unifiedOrder(30874,1,0.01);
       return json_encode(['code'=>200,'data'=>$result,'msg'=>'ok']);
    }

    public function AliPay()
    {
        require_once __DIR__.'/../../../../../vendor/alipay/aop/AopClient.php';
        require_once __DIR__.'/../../../../../vendor/alipay/aop/request/AlipayTradeWapPayRequest.php';
        $aop = new AopClient();
        $aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
        $aop->appId = '2018031502378631';
        $aop->rsaPrivateKey = 'MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQC0e+4Kncrr6V8Neer6dtMOVHMJ5xqnm/rNZ6A2k5Q6+5FU9DkJYNo+lo+hiT3wmi7swSQqKXGYk6+MH2eT+XdyYDXdcYUqBWTrqVvaHvXQURuf7Zc5JOrIusvgh2U2CsfzXt2AcOmQmLxegGsURsUr63AXftCVuHpyWDUzs9jPPTMph5f04gz0VjNAbA02X13IamBAFBxIqTNLJCKxIdEUdeJlRIclKMry1SpRzys0WocN/Y7Xijo/qbZFcsgPx33Hr1j941nz5fH7Wmsnr/zuIi9A2n6rKa9ODArfZFSVhTDHsFrrmszoSpnNPkUBzBssrDRILUvhDsGpH0XCMVY9AgMBAAECggEAHpJDbv7taWp9VE4LdGN+OpYpaksAI9Xy9KoR5Ey5Ngh4xJgdtS33qdRc/fK+UCv9uNK6an3cpQiXGrgTFmiSSAht91WMReLmBlkImvjVkHS8pilbjS1oq5mggSbOCQpodhvijygRGBIXDjbYbHXUXi0iLoinkkTOUOIKGPjkx62AFnmFyU/C8I/EoFCFuR+0bp7F3uwOZqoN1UPv/95uIm5cecmkQ0ToCK8Qe6SCN2qC52tD1Xa4OIdDXeINEhC05kRjVRjVoLnFmeQqUfEdDruChZJ6D5eeR2kEk/qlSLxO3EWCp7BrrfpGu+4NKdketNZrp+SQ5mfW3iyqmx9fbQKBgQDpJ2tnRnvS2nB6YZ3TEfPy805xsVagwJZz7+EescwiUME49fJ9JNP9xbe0dgS1o1O7C8vTcer4dVOd7Vv3sCVWnHgT2rjgewHYDCwKVrNJqL1P6tnyJFuupVIHJT0WzkZFWLyecUxruFlSOhyFpK6G3IIG2X0vADL9TlNr9DT61wKBgQDGK05XfyhlCIQfrJ8W77E7sDTxFAjK0leYm06zkK2dN+AiS0YABJf4nAlBTzAvO3QZPc2ShB53+lx2XEDmvXNc8pg0YketEd5OMsFXSimfguhcO3tnPEGEnQchedS/ANalrwHINhEk63PPuNdreF351B3lzDfaw16V7r5F348JCwKBgE5sb/gBAU1fJE5F32xLsZ6asFwVpmnT3ceJfFNywpMYTqX2NGZbqOLHSo9s0xC1q0hTI3Av9TU1YbbRTAn4Odb0Mn+bJmx7c5dUIMwpdYzlMShceoq0KBKKkRjOMcomAAT7YBZ7TZU+IO1DlqxtRDcgnKvpI+5XRs9lNTIuplNpAoGACyea5E/zDSTakxHbbqYVWt/DSyKukAQhDCUJ3A+zxhrEEgocqZmYmFToLHXxp2b4VQdmj+3B7Uz5cWwl9xcI7F13ddNmZ3aPBeXTfj9dcm4i+DYc7yW0JmvUX+0Era+1ZWQhfIyWkHZ0cWfdMF55I7vt5uaE6lp+83+Z1EMOQRsCgYAzq6qsUNJMbsg/BaDLLWJ35eCZ8bztOSVke/dp00fv8WBtFgCeNFvanVTlVq9Hif8m3r+aZChOk5p7n50LUc3J4TdAVs+ssmbhbyNCxdt2mGDEoAd4NaKnY4TX7MMaLgx/WQSKd2k4ELugkqbD5EfSgHvboUEDFSehsqDOgnnn1g==';
        $aop->alipayrsaPublicKey='MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA3zbCRKLGw/58h6QTk5rzjmIOapyRcg9l+rs5fgsC8gQHP/RtvuRiI0hpL/Qyzzr4AQcZ1a7WuSFdE5CZ7DtnvCdYj5FXadfjhlP6I5TTAe0gTbkeUSygFnLN0g/OHQ2dkm1L6vpmwVCW+cqI0pQo5SVukuC8r2mMyvxVtvGC8boBprxXptpXwcckUU8qGmeVvXPwoAafix92QMDThdhTdC4IOf+8+o1A/QJmNKoMBU3IuHyj5LmGj5dJCW9sc+PEWFO7yytkz7IfT4psSwsXqHULneCqdCC0lvlXIlVPU9TqD+zQjLofaYD6sCEc0vO1XQ/xnfBkIq5o5398kR32owIDAQAB';
        $aop->apiVersion = '1.0';
        $aop->postCharset='UTF-8';
        $aop->format='json';
        $aop->signType='RSA2';
        $request = new AlipayTradeWapPayRequest ();
        $request->setBizContent("{" .
            "    \"body\":\"测试支付0627\"," .
            "    \"subject\":\"TD\"," .
            "    \"out_trade_no\":\"202006270001\"," .
            "    \"timeout_express\":\"90m\"," .
            "    \"total_amount\":0.01," .
            "    \"product_code\":\"QUICK_WAP_WAY\"" .
            "  }");
        $result = $aop->pageExecute ( $request);
        echo $result;
    }
}
