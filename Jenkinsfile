def dockeruser = "dfggs"
def imagename = "ubuntu:16"
def container = "2ndMilestoneContainer"
node {
   echo 'Building Apache Docker Image'

stage('Git Checkout') {
    git 'https://github.com/dfggs-iscteiul/ESII-2ndMilestone'
    }
    
stage('Build Docker Imagae'){
     powershell "docker build -t  ${imagename} ."
    }

stage ('Runing docker-compose'){
    powershell "docker-compose up -d"
    }   

stage('Stop Existing Container'){
     powershell "docker stop ${container}"
    }
    
stage('Remove Existing Container'){
     powershell "docker rm ${container}"
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
