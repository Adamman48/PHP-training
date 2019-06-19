<?php

namespace App\Controller;

use App\Entity\Posts;
use App\Repository\PostsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class MainController extends AbstractController 
{
  private $postsrepository;

  public function __construct(PostsRepository $postsrepository)
  {
    $this->postsrepository = $postsrepository;
  }

  /**
  * @Route("/", name="posts-display", methods={"GET"})
  */
  public function displayPosts() 
  {
    $posts = $this->postsrepository->findAll();

    return $this->render('index.html.twig', [
      'posts' => $posts,
      'showError' => false,
    ]);
  }

  /**
  * @Route("/submit", name="posts-submit", methods={"GET"})
  */
  public function displayForm()
  {
    return $this->render('submit.html.twig');
  }

  /**
  * @Route("/save", name="save-post", methods={"POST"})
  */
  public function savePostToDb(Request $request, ValidatorInterface $validator)
  {
    $post = new Posts();
    $post->setText($request->request->get('postUrl'));
    $post->setPostTitle($request->request->get('title'));
    $post->setUser('Dummy User');

    $errors = $validator->validate($post);

    if (count($errors) > 0) 
    {
      $post = $this->postsRepository->findAll();
      return $this->render('index.html.twig', [
          'posts' => $posts,
          'showError' => true
      ]);
    }

    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->persist($post);
    $entityManager->flush();
    return $this->redirectToRoute('posts-display');
  }

  /**
  * @Route("/{postId}", name="navigate-post", methods={"GET"})
  */
  public function navigateToPost(int $postId)
  {
    $postToDisplay = $this->postsrepository->find($postId);
    return $this->render('displayPost.html.twig', [
      'postToDisplay' => $postToDisplay,
    ]);
  }

  /**
  * @Route("/{postId}/{determineVote}", name="vote-post", methods={"GET"})
  */
  public function voteOnPost(int $postId, string $determineVote)
  {
    $postToVote = $this->postsrepository->find($postId);
    $currentVoteCount = $postToVote->getVoteCount();
    $newVoteCount = $determineVote === "up" ? $currentVoteCount + 1 : $currentVoteCount - 1;
    $postToVote->setVoteCount($newVoteCount);

    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->persist($postToVote);
    $entityManager->flush();
    
    return $this->redirectToRoute('posts-display');
  }

}

?>