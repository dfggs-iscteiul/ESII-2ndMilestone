def dockeruser = "dfggs"
def imagename = "ubuntu:16"
def container = "2ndMilestoneContainer-Ubuntu"
node {
   echo 'Building Apache Docker Image'

stage('Git Checkout') {
    git 'https://github.com/dfggs-iscteiul/ESII-2ndMilestone'
    }
    
stage('Build Ubuntu&Java Docker Image'){
     powershell "docker build -t  ${imagename} ."
    }

stage('Stop Existing Containers'){
     powershell "if [ (docker ps | grep 2ndMilestoneContainer-Ubuntu | wc -l) -gt 0 ] ; then docker stop ${container} fi"
     powershell "if [ (docker ps | grep 'mysql' | wc -l) -gt 0 ] ; then docker stop ${mysql} fi"
     powershell "if [ (docker ps | grep 'phpmyadmin' | wc -l) -gt 0  ]; then docker stop ${phpmyadmin} fi"
     powershell "if [ (docker ps | grep 'wordpress' | wc -l) -gt 0  ]; then docker stop ${wordpress} fi"
    }
    
stage('Remove Existing Containers'){
     ppowershell "if [  (docker ps | grep 2ndMilestoneContainer-Ubuntu | wc -l) -gt 0  ]; then docker rm ${container} fi"
     powershell "if [  (docker ps | grep 'mysql' | wc -l) -gt 0  ]; then docker rm ${mysql} fi"
     powershell "if [  (docker ps | grep 'phpmyadmin' | wc -l) -gt 0  ]; then docker rm ${phpmyadmin} fi"
     powershell "if [  (docker ps | grep 'wordpress' | wc -l) -gt 0  ]; then docker rm ${wordpress} fi"
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
