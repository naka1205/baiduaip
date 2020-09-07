<?php
namespace BaiduAip;

class AipFace extends AipBase {

    /**
     * 人脸检测 detect api url
     * @var string
     */
    private $detectUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/detect';

    /**
     * 人脸搜索 search api url
     * @var string
     */
    private $searchUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/search';

    /**
     * 人脸搜索 M:N 识别 multi_search api url
     * @var string
     */
    private $multiSearchUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/multi-search';

    /**
     * 人脸注册 user_add api url
     * @var string
     */
    private $userAddUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/user/add';

    /**
     * 人脸更新 user_update api url
     * @var string
     */
    private $userUpdateUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/user/update';

    /**
     * 人脸删除 face_delete api url
     * @var string
     */
    private $faceDeleteUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/face/delete';

    /**
     * 用户信息查询 user_get api url
     * @var string
     */
    private $userGetUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/user/get';

    /**
     * 获取用户人脸列表 face_getlist api url
     * @var string
     */
    private $faceGetlistUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/face/getlist';

    /**
     * 获取用户列表 group_getusers api url
     * @var string
     */
    private $groupGetusersUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/group/getusers';

    /**
     * 复制用户 user_copy api url
     * @var string
     */
    private $userCopyUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/user/copy';

    /**
     * 删除用户 user_delete api url
     * @var string
     */
    private $userDeleteUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/user/delete';

    /**
     * 创建用户组 group_add api url
     * @var string
     */
    private $groupAddUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/group/add';

    /**
     * 删除用户组 group_delete api url
     * @var string
     */
    private $groupDeleteUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/group/delete';

    /**
     * 组列表查询 group_getlist api url
     * @var string
     */
    private $groupGetlistUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/group/getlist';

    /**
     * 身份验证 person_verify api url
     * @var string
     */
    private $personVerifyUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/person/verify';

    /**
     * 语音校验码接口 video_sessioncode api url
     * @var string
     */
    private $videoSessioncodeUrl = 'https://aip.baidubce.com/rest/2.0/face/v1/faceliveness/sessioncode';

    

    /**
     * 人脸检测接口
     */
    public function detect($image, $imageType, $face_field='',$max_face_num=0,$face_type=''){

        $data = array();
        
        $data['image'] = $image;
        $data['image_type'] = $imageType;
        
        if (!empty($face_field)) {
            $data['face_field'] = $face_field;
        }
        if ($max_face_num > 0 ) {
            $data['max_face_num'] = $max_face_num;
        }

        if (!empty($face_type)) {
            $data['face_type'] = $face_type;
        }

        return $this->request($this->detectUrl, json_encode($data),  array(
            'Content-Type' => 'application/json',
        ));
    }

    /**
     * 人脸搜索接口
     */
    public function search($image, $imageType, $groupIdList, $options=array()){

        $data = array();
        
        $data['image'] = $image;
        $data['image_type'] = $imageType;
        $data['group_id_list'] = $groupIdList;

        $data = array_merge($data, $options);
        return $this->request($this->searchUrl, json_encode($data),  array(
            'Content-Type' => 'application/json',
        ));
    }

    /**
     * 人脸搜索 M:N 识别接口
     */
    public function multiSearch($image, $imageType, $groupIdList, $options=array()){

        $data = array();
        
        $data['image'] = $image;
        $data['image_type'] = $imageType;
        $data['group_id_list'] = $groupIdList;

        $data = array_merge($data, $options);
        return $this->request($this->multiSearchUrl, json_encode($data),  array(
            'Content-Type' => 'application/json',
        ));
    }

    /**
     * 人脸注册接口
     */
    public function addUser($image, $imageType, $groupId, $userId, $options=array()){

        $data = array();
        
        $data['image'] = $image;
        $data['image_type'] = $imageType;
        $data['group_id'] = $groupId;
        $data['user_id'] = $userId;

        $data = array_merge($data, $options);
        return $this->request($this->userAddUrl, json_encode($data),  array(
            'Content-Type' => 'application/json',
        ));
    }

    /**
     * 人脸更新接口
     */
    public function updateUser($image, $imageType, $groupId, $userId, $options=array()){

        $data = array();
        
        $data['image'] = $image;
        $data['image_type'] = $imageType;
        $data['group_id'] = $groupId;
        $data['user_id'] = $userId;

        $data = array_merge($data, $options);
        return $this->request($this->userUpdateUrl, json_encode($data),  array(
            'Content-Type' => 'application/json',
        ));
    }

    /**
     * 人脸删除接口
     */
    public function faceDelete($userId, $groupId, $faceToken, $options=array()){

        $data = array();
        
        $data['user_id'] = $userId;
        $data['group_id'] = $groupId;
        $data['face_token'] = $faceToken;

        $data = array_merge($data, $options);
        return $this->request($this->faceDeleteUrl, json_encode($data),  array(
            'Content-Type' => 'application/json',
        ));
    }

    /**
     * 用户信息查询接口
     */
    public function getUser($userId, $groupId, $options=array()){

        $data = array();
        
        $data['user_id'] = $userId;
        $data['group_id'] = $groupId;

        $data = array_merge($data, $options);
        return $this->request($this->userGetUrl, json_encode($data),  array(
            'Content-Type' => 'application/json',
        ));
    }

    /**
     * 获取用户人脸列表接口
     */
    public function faceGetlist($userId, $groupId, $options=array()){

        $data = array();
        
        $data['user_id'] = $userId;
        $data['group_id'] = $groupId;

        $data = array_merge($data, $options);
        return $this->request($this->faceGetlistUrl, json_encode($data),  array(
            'Content-Type' => 'application/json',
        ));
    }

    /**
     * 获取用户列表接口
     */
    public function getGroupUsers($groupId, $options=array()){

        $data = array();
        
        $data['group_id'] = $groupId;

        $data = array_merge($data, $options);
        return $this->request($this->groupGetusersUrl, json_encode($data),  array(
            'Content-Type' => 'application/json',
        ));
    }

    /**
     * 复制用户接口
     */
    public function userCopy($userId, $options=array()){

        $data = array();
        
        $data['user_id'] = $userId;

        $data = array_merge($data, $options);
        return $this->request($this->userCopyUrl, json_encode($data),  array(
            'Content-Type' => 'application/json',
        ));
    }

    /**
     * 删除用户接口
     */
    public function deleteUser($groupId, $userId, $options=array()){

        $data = array();
        
        $data['group_id'] = $groupId;
        $data['user_id'] = $userId;

        $data = array_merge($data, $options);
        return $this->request($this->userDeleteUrl, json_encode($data),  array(
            'Content-Type' => 'application/json',
        ));
    }

    /**
     * 创建用户组接口
     */
    public function groupAdd($groupId, $options=array()){

        $data = array();
        
        $data['group_id'] = $groupId;

        $data = array_merge($data, $options);
        return $this->request($this->groupAddUrl, json_encode($data),  array(
            'Content-Type' => 'application/json',
        ));
    }

    /**
     * 删除用户组接口
     */
    public function groupDelete($groupId, $options=array()){

        $data = array();
        
        $data['group_id'] = $groupId;

        $data = array_merge($data, $options);
        return $this->request($this->groupDeleteUrl, json_encode($data),  array(
            'Content-Type' => 'application/json',
        ));
    }

    /**
     * 组列表查询接口
     */
    public function getGroupList($options=array()){

        $data = array();
        

        $data = array_merge($data, $options);
        return $this->request($this->groupGetlistUrl, json_encode($data),  array(
            'Content-Type' => 'application/json',
        ));
    }

    /**
     * 身份验证接口
     */
    public function personVerify($image, $imageType, $idCardNumber, $name, $options=array()){

        $data = array();
        
        $data['image'] = $image;
        $data['image_type'] = $imageType;
        $data['id_card_number'] = $idCardNumber;
        $data['name'] = $name;

        $data = array_merge($data, $options);
        return $this->request($this->personVerifyUrl, json_encode($data),  array(
            'Content-Type' => 'application/json',
        ));
    }

    /**
     * 语音校验码接口接口
     */
    public function videoSessioncode($options=array()){

        $data = array();
        

        $data = array_merge($data, $options);
        return $this->request($this->videoSessioncodeUrl, json_encode($data),  array(
            'Content-Type' => 'application/json',
        ));
    }
    /**
     * 在线活体检测 faceverify api url
     * @var string
     */
    private $faceverifyUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceverify';

    /**
     * 在线活体检测接口
     *
     * @param array $images
     * @return array
     */
    public function faceverify($images){

        return $this->request($this->faceverifyUrl, json_encode($images), array(
            'Content-Type' => 'application/json',
        ));
    }

    /**
     * 人脸比对 match api url
     * @var string
     */
    private $matchUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/match';

    /**
     * 人脸比对接口
     *
     * @param array $images
     * @return array
     */
    public function match($images){

        return $this->request($this->matchUrl, json_encode($images), array(
            'Content-Type' => 'application/json',
        ));
    }


}