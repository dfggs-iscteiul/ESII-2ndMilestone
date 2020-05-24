def dockeruser = "dfggs"
def imagename = "ubuntu:16"
def container = "Ubuntu"
node {
   echo 'Building Apache Docker Image'

stage('Git Checkout') {
    git 'https://github.com/dfggs-iscteiul/ESII-2ndMilestone'
    }
    
stage('Build Ubuntu Docker Image'){
     powershell "docker build -t  ${imagename} ."
    }

stage('Stop Existing Containers'){
     powershell "docker stop ${container}"
     powershell "docker stop mysql"
     powershell "docker stop phpmyadmin"
     powershell "docker stop wordpress"
    }
    
stage('Remove Existing Containers'){
     powershell "docker rm ${container}"
     powershell "docker rm mysql"
     powershell "docker rm phpmyadmin"
     powershell "docker rm wordpress"
    }

stage ('Runing Container to test built Docker Image'){
    powershell "docker run -dit --name ${container} -p 80:81 ${imagename}"
    }

stage ('Runing docker-compose for remaining services'){
    powershell "docker-compose up -d"
    }
    
stage('Tag Docker Image'){
    powershell "docker tag ${imagename} ${env.dockeruser}/ubuntu:16.04"
    }

stage('Change wp-content permissions'){
    powershell "RUN chmod -R  755 ./Wordpress/wp-content"
    }

stage('Docker Login and Push Image'){
    withCredentials([usernamePassword(credentialsId: 'docker-hub-credentials', passwordVariable: 'dockerpasswd', usernameVariable: 'dockeruser')]) {
    powershell "docker login -u ${dockeruser} -p ${dockerpasswd}"
    }
    powershell "docker push ${dockeruser}/ubuntu:16.04"
    }

}
