<?php

/**
 * Created by PhpStorm.
 * User: apple
 * Date: 18/10/20
 * Time: 下午2:49
 */
class Blog_model extends CI_Model
{

    public function get_blog_list(){
        //$query = $this->db->get('t_blog');

//      自带数据库表绑定
//        $this->db->select('*');
//        $this->db->from('t_blog');
//        //数据库绑定,把 t_blog.catalog_id 与 t_blog_catalog.catalog_id绑定
//        $this->db->join('t_blog_catalog','t_blog.catalog_id = t_blog_catalog.catalog_id');
//        //按时间排序 desc倒序
//        $this->db->order_by('t_blog.post_time','desc');
//        $query = $this->db->get();
//        return $query->result();


////      自带数据库表绑定(老师代码，起别名)
//        $this->db->select('*');
//        $this->db->from('t_blog b');
//        $this->db->join('t_blog_catalog c', 'b.catalog_id = c.catalog_id');
//        $this->db->order_by('b.post_time','desc');
//        $query = $this->db->get();

//      原生数据库表绑定
        $sql = "select *,(select count(*) from t_comment where t_comment.blog_id = t_blog.blog_id) num
        from t_blog,t_blog_catalog
        where t_blog.catalog_id = t_blog_catalog.catalog_id
        order by t_blog.post_time desc";
        $query = $this->db->query($sql);
        return  $query->result();
    }

    //通过用户id获取他的博客
    public function get_blog_list_by_id($id){
        $sql = "select *,
(select count(*) from t_comment tc where tc.blog_id = b.blog_id) num
 from t_blog b,t_blog_catalog c
where b.catalog_id = c.catalog_id and b.user_id = $id
order by b.post_time desc";

        $query = $this->db->query($sql);
        return  $query->result();
    }

    //通过博客id获取博客内容及相关信息
    public function get_blog_by_id($blog_id){
        $sql = "select *,(select count(*) from t_comment c where c.blog_id = b.blog_id) commentnum,
        (select count(*) from t_collect tc where tc.blog_id = b.blog_id) collectnum
                from t_blog b where b.blog_id = $blog_id";

        $query = $this->db->query($sql);
        return  $query->row();
    }

    //获取博客分类
    public function get_catalog_list(){
        $query = $this->db->get('t_blog_catalog');
        return $query->result();
    }

    //通过博客id获取评论
    public function get_comment_by_blogid($blog_id){
        $this->db->select('*');
        $this->db->from('t_comment c');
        $this->db->join('t_user u','c.user_id=u.id');
        $this->db->where('c.blog_id',$blog_id);
        return $this->db->get()->result();

//        $sql = "select * from t_comment c,t_user u where c.user_id=u.user_id and c.blog_id =$blog_id";
//
//        $sql = " select * from t_comment c left join t_user on c.user_id=u.user_id  where c.blog_id =$blog_id";

    }
}