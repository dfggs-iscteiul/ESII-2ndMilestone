def dockeruser = "dfggs"
def imagename = "ubuntu:16"
def container = "2ndMilestoneContainer - Ubuntu"
node {
   echo 'Building Apache Docker Image'

stage('Git Checkout') {
    git 'https://github.com/dfggs-iscteiul/ESII-2ndMilestone'
    }
    
stage('Build Ubuntu&Java Docker Image'){
     powershell "docker build -t  ${imagename} ."
    }

stage('Stop Existing Containers'){
     powershell "docker stop ${container} || true"
     powershell "docker stop ${mysql} || true"
     powershell "docker stop ${phpmyadmin} || true"
     powershell "docker stop ${wordpress} || true"
    }
    
stage('Remove Existing Containers'){
     powershell "docker rm ${container} || true"
     powershell "docker rm ${mysql} || true"
     powershell "docker rm ${phpmyadmin} || true"
     powershell "docker rm ${wordpress} || true"
    }

stage ('Runing docker-compose for remaining services'){
    powershell "docker-compose up -d"
    }

stage ('Runing Container to test built Docker Image'){
    powershell "docker run -dit --name ${container} -p 80:81 ${imagename}"
    }
    
stage('Tag Docker Image'){
    powershell "docker tag ${imagename} ${env.dockeruser}/ubuntu:16.04"
    }

stage('Docker Login and Push Image'){
    withCredentials([usernamePassword(credentialsId: 'docker-hub-credentials', passwordVariable: 'dockerpasswd', usernameVariable: 'dockeruser')]) {
    powershell "docker login -u ${dockeruser} -p ${dockerpasswd}"
    }
    powershell "docker push ${dockeruser}/ubuntu:16.04"
    }

}
