<?php

namespace AppBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
class PostController extends Controller
{

    /**
     *@ApiDoc(
     *     resource=true,
     *     description="Get one single post",
     *     requirements={
     *         {
     *             "name"="id",
     *             "dataType"="integer",
     *             "requirements"="\d+",
     *             "description"="The post unique identifier."
     *         }
     *     },
     *     section="posts"
     * )
     * @Route("/api/posts/{id}",name="show_post")
     * @Method({"GET"})
     */
    public function showPost($id)
    {
        $post=$this->getDoctrine()->getRepository('AppBundle:Post')->find($id);


        if (empty($post)){
            $response=array(
                'code'=>1,
                'message'=>'post not found',
                'error'=>null,
                'result'=>null
            );

            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }

        $data=$this->get('jms_serializer')->serialize($post,'json');


        $response=array(

            'code'=>0,
            'message'=>'success',
            'errors'=>null,
            'result'=>json_decode($data)

        );

        return new JsonResponse($response,200);


    }

    /**
     * @ApiDoc(
     *     resource=true,
     *     description="Get the list of all posts",
     *     section="posts"
     * )
     *
     * @Route("/api/posts",name="list_posts")
     * @Method({"GET"})
     */

    public function listPost()
    {

        $posts=$this->getDoctrine()->getRepository('AppBundle:Post')->findAll();

        if (!count($posts)){
            $response=array(

                'code'=>1,
                'message'=>'No posts found!',
                'errors'=>null,
                'result'=>null

            );


            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }


        $data=$this->get('jms_serializer')->serialize($posts,'json');

        $response=array(

            'code'=>0,
            'message'=>'success',
            'errors'=>null,
            'result'=>json_decode($data)

        );

        return new JsonResponse($response,200);


    }


}
